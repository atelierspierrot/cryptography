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

/**
 * The keys here must be defined as an array like:
 *
 *      array(
 *          word    =>  X
 *          syllab  =>  Y
 *          A (letter) => Z
 *      )
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Repertory
    extends Homophonic
{

    /**
     * Preparing the ciphers
     *
     * @param $table
     * @return mixed
     * @throws \InvalidArgumentException
     */
    protected function _buildCipherKey($table)
    {
        if (!is_array($table)) {
            throw new \InvalidArgumentException(
                sprintf('Cipher keys for Repertory substitution must be an array (got "%s"!', gettype($table))
            );
        }
        $values = array();
        foreach ($table as $item) {
            if (empty($item)) {
                throw new \InvalidArgumentException(
                    'Correspondence list for Repertory substitution must not be empty!'
                );
            }
            if (in_array($item, $values)) {
                throw new \InvalidArgumentException(
                    sprintf('Duplication of correspondence is not allowed for Repertory substitution (found duplicated "%s")', $item)
                );
            }
            $values[] = $item;
        }
        return $table;
    }

    /**
     * Debugging the substitution table
     *
     * @return string
     */
    public function substitutionTableToString()
    {
        $ciphers = $this->substitution_table->getSubstitutions();
        $ciphers = $ciphers[0];
        return Helper::tableToString(
            $ciphers, $this->substitution_table->getPlaintextKey(), array(), __CLASS__.' Encryption Table'
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
     *
     * @TODO
     */
    public function decrypt($str, $as_array = false)
    {
        $str    = $this->_prepare($str);
        $table  = $this->substitution_table->getSubstitutionTable();
        $s      = str_split($str, strlen($this->min));
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