<?php
/**
 * This file is part of the Cryptography package.
 *
 * Copyleft (ↄ) 2014-2015 Pierre Cassat <me@e-piwi.fr> and contributors
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * The source code of this package is available online at 
 * <http://github.com/atelierspierrot/cryptography>.
 */

namespace Cryptography\SubstitutionCipher;

use \Cryptography\Cryptography;
use \Cryptography\Helper;
use \Cryptography\SubstitutionTable\Rotary as RotarySubstitutionTable;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class PolyAlphabetic
    extends Simple
{

    /**
     * @var \Cryptography\SubstitutionTable\Rotary The substitution table object used to crypt/decrypt
     */
    protected $substitution_table;

    /**
     * @var int Frequency of the rotation of the cipher
     */
    protected $frequency    = 1;

    /**
     * @param string $plaintext_key
     * @param int $frequency
     * @param int $rotation
     * @param int $flag
     */
    public function __construct(
        $plaintext_key,
        $frequency = 1, $rotation = 1,
        $flag = Cryptography::PROCESS_ALL
    ) {
        $this
            ->setSubstitutionTable(
                new RotarySubstitutionTable($plaintext_key, $rotation)
            )
            ->setFlag($flag)
            ->_setFrequency($frequency)
            ->setFlag($flag)
            ;
    }

    /**
     * Reset the substitution table to its original form
     *
     * @return $this
     */
    protected function _reset()
    {
        parent::_reset();
        $this->substitution_table->setSubstitutions(
            array($this->substitution_table->getPlaintextKey())
        );
        return $this;
    }

    /**
     * Define the rotation frequency
     *
     * @param $freq
     * @return $this
     */
    protected function _setFrequency($freq)
    {
        $this->frequency = $freq;
        return $this;
    }

    /**
     * Debugging the substitution table
     *
     * @return string
     */
    public function substitutionTableToString()
    {
        $this->_reset();
        $ptk = $this->substitution_table->getPlaintextKey();
        $r = array();
        for ($i=0; $i<floor(strlen($ptk) / $this->frequency); $i++) {
            if ($i > 0) { $this->substitution_table->rotate(); }
            $ciphers = $this->substitution_table->getSubstitutions();
            $r[] = str_split($ciphers[0]);
        }
        return Helper::tableToString(
            $r, str_split($ptk), array(), __CLASS__.' Encryption Table'
        );
    }

    /**
     * Crypt a string
     *
     * @param   string  $str        The string to crypt
     * @param   bool    $as_array   Get the result as an array or a string (default)
     * @return  array|string
     */
    public function crypt($str, $as_array = false)
    {
        $str    = $this->_prepare($str);
        $str_e  = ($as_array ? array() : '');
        while (strlen($str)>0) {
            $substr = substr($str, 0, $this->frequency);
            $str    = substr($str, $this->frequency);
            if ($as_array) {
                $str_e[] = $this->_cryptRun($substr, $as_array);
            } else {
                $str_e .= $this->_cryptRun($substr);
            }
            $this->substitution_table->rotate();
        }
        return $str_e;
    }

    /**
     * One run of encryption on a string
     *
     * @param   string  $str
     * @param   bool    $as_array   Get the result as an array or a string (default)
     * @return  array|string
     */
    protected function _cryptRun($str, $as_array = false)
    {
        $table  = $this->substitution_table->getSubstitutionTable();
        $s      = str_split($str);
        $r      = array();
        foreach ($s as $l) {
            if ($l==Cryptography::SPACE && ($this->flag & Cryptography::KEEP_SPACES)) {
                $r[] = Cryptography::SPACE;
            } else {
                $r[] = $table[$l];
            }
        }
        return ($as_array ? $r : implode('', $r));
    }

    /**
     * Decrypt a string
     *
     * @param   string  $str        The string to decrypt
     * @param   bool    $as_array   Get the result as an array or a string (default)
     * @return  array|string
     */
    public function decrypt($str, $as_array = false)
    {
        $this->_reset();
        $str    = $this->_prepare($str);
        $str_e  = ($as_array ? array() : '');
        while (strlen($str)>0) {
            $substr = substr($str, 0, $this->frequency);
            $str    = substr($str, $this->frequency);
            if ($as_array) {
                $str_e[] = $this->_decryptRun($substr, $as_array);
            } else {
                $str_e .= $this->_decryptRun($substr);
            }
            $this->substitution_table->rotate();
        }
        return $str_e;
    }

    /**
     * One run of decryption on a string
     *
     * @param   string  $str
     * @param   bool    $as_array   Get the result as an array or a string (default)
     * @return  array|string
     */
    protected function _decryptRun($str, $as_array = false)
    {
        $table  = $this->substitution_table->getSubstitutionTable();
        $s      = str_split($str);
        $r      = array();
        foreach ($s as $l) {
            if ($l==Cryptography::SPACE && ($this->flag & Cryptography::KEEP_SPACES)) {
                $r[] = Cryptography::SPACE;
            } else {
                $r[] = array_search($l, $table);
            }
        }
        return ($as_array ? $r : implode('', $r));
    }

}

// Endfile