<?php
/**
 * This file is part of the Cryptography package.
 *
 * Copyright (c) 2013-2015 Pierre Cassat <me@e-piwi.fr> and contributors
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * The source code of this package is available online at 
 * <http://github.com/atelierspierrot/cryptography>.
 */

namespace Cryptography\SubstitutionCipher;

use \Cryptography\Cryptography;
use \Cryptography\Helper;
use \Cryptography\SubstitutionTable\TextRepertory as TextRepertorySubstitutionTable;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Book
    extends Simple
{

    /**
     * @param string $plaintext_key
     * @param int $flag
     */
    public function __construct(
        $plaintext_key = '',
        $flag = Cryptography::KEEP_SPACES,
        $scope_fag = Cryptography::SCOPE_LETTER,
        $occurrence_flag = Cryptography::ALL_OCCURRENCES,
        $character_flag = Cryptography::ALPHABET_UPPER
    ) {
        $this
            ->setSubstitutionTable(
                new TextRepertorySubstitutionTable(
                    $plaintext_key,
                    $scope_fag,
                    $occurrence_flag,
                    $character_flag
                )
            )
            ->setFlag($flag)
        ;
    }

    public function setScopeFlag($flag)
    {
        $this->substitution_table->setScopeFlag($flag);
        return $this;
    }

    public function setOccurrenceFlag($flag)
    {
        $this->substitution_table->setOccurrenceFlag($flag);
        return $this;
    }

    public function setCharacterFlag($flag)
    {
        $this->substitution_table->setCharacterFlag($flag);
        return $this;
    }

    /**
     * Prepare the string to crypt/decrypt: this will return the string according to keys case
     *
     * @param $str
     * @return array|string
     */
    protected function _prepare($str)
    {
        if (!is_string($str)) {
            return $str;
        }
        return Helper::homogenizeString($str, $this->substitution_table->getCharacterFlag());
    }

    /**
     * Reset the substitution tables when updating a key
     *
     * @return $this
     */
    protected function _reset()
    {
        return $this;
    }

    /**
     * Debugging the substitution table
     *
     * @return string
     */
    public function substitutionTableToString()
    {
        $ciphers = $this->substitution_table->getSubstitutions();
        return Helper::tableToString(
            $ciphers, array(), array(), __CLASS__.' Encryption Table'
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
        $scope  = $this->substitution_table->getScopeFlag();
        if ($scope & Cryptography::SCOPE_WORD) {
            $s      = explode(' ', $str);
            $r      = array();
            foreach ($s as $l) {
                $r[] = array_key_exists($l, $table) ? $table[$l] : '?';
            }
            return ($as_array ? $r : implode(' ', $r));
        } elseif ($scope & Cryptography::SCOPE_LETTER) {
            $s      = str_split($str);
            $r      = array();
            foreach ($s as $l) {
                if ($l==Cryptography::SPACE && ($this->flag & Cryptography::KEEP_SPACES)) {
                    $r[] = Cryptography::SPACE;
                } else {
                    $r[] = array_key_exists($l, $table) ? $table[$l] : '?';
                }
            }
            return ($as_array ? $r : implode('', $r));
        }
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
        $scope  = $this->substitution_table->getScopeFlag();
        if ($scope & Cryptography::SCOPE_WORD) {
            $s      = explode(' ', $str);
            $r      = array();
            foreach ($s as $l) {
                $r[] = ($l!='?' && in_array($l, $table)) ? array_search($l, $table) : '?';
            }
            return ($as_array ? $r : implode(' ', $r));
        } elseif ($scope & Cryptography::SCOPE_LETTER) {
            $s      = (!is_array($str) ? str_split($str) : $str);
            $r      = array();
            foreach ($s as $l) {
                if ($l==Cryptography::SPACE && ($this->flag & Cryptography::KEEP_SPACES)) {
                    $r[] = Cryptography::SPACE;
                } else {
                    $r[] = ($l!='?' && in_array($l, $table)) ? array_search($l, $table) : '?';
                }
            }
            return ($as_array ? $r : implode('', $r));
        }
    }

}

// Endfile