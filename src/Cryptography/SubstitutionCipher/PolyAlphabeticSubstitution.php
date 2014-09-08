<?php
/**
 * PHP cryptography
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/cryptography>
 */

namespace Cryptography\SubstitutionCipher;

use \Cryptography\Cryptography;
use \Cryptography\Helper;
use \Cryptography\SubstitutionTable\RotarySubstitutionTable;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class PolyAlphabeticSubstitution
    extends SimpleSubstitution
{

    /**
     * @var RotarySubstitutionTable The substitution table object used to crypt/decrypt
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
     * @param $str
     * @return mixed|string
     */
    public function crypt($str)
    {
        $str    = $this->_prepare($str);
        $str_e  = '';
        while (strlen($str)>0) {
            $substr = substr($str, 0, $this->frequency);
            $str    = substr($str, $this->frequency);
            $str_e .= $this->_cryptRun($substr);
            $this->substitution_table->rotate();
        }
        return $str_e;
    }

    /**
     * One run of encryption on a string
     *
     * @param $str
     * @return string
     */
    protected function _cryptRun($str)
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
        return implode('', $r);
    }

    /**
     * Decrypt a string
     *
     * @param $str
     * @return mixed|string
     */
    public function decrypt($str)
    {
        $this->_reset();
        $str    = $this->_prepare($str);
        $str_e  = '';
        while (strlen($str)>0) {
            $substr = substr($str, 0, $this->frequency);
            $str    = substr($str, $this->frequency);
            $str_e .= $this->_decryptRun($substr);
            $this->substitution_table->rotate();
        }
        return $str_e;
    }

    /**
     * One run of decryption on a string
     *
     * @param $str
     * @return string
     */
    protected function _decryptRun($str)
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
        return implode('', $r);
    }

}

// Endfile