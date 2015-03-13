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

namespace Cryptography\SubstitutionTable;

use \Cryptography\Helper;
use \Cryptography\SubstitutionCipher\Simple as SimpleCipher;

/**
 * @author  piwi <me@e-piwi.fr>
 */
class TabulaRecta
{

    /**
     * @var string The original string used
     */
    protected $plaintext_key        = null;

    /**
     * @var array The substitutions table
     */
    protected $substitution_table   = array();

    /**
     * @param $plaintext_key
     */
    public function __construct($plaintext_key)
    {
        $this->setPlaintextKey($plaintext_key);
    }

    /**
     * Define the plain text key and construct the substitutions table
     *
     * @param $str
     */
    public function setPlaintextKey($str)
    {
        $this->plaintext_key = $str;
    }

    /**
     * Get the full substitution table
     */
    public function getSubstitutionTable()
    {
        $str                        = $this->plaintext_key;
        $this->substitution_table   = array();
        for ($i=0; $i<strlen($str); $i++) {
            if ($i>0) {
                $str = Helper::rotate($str, 1);
            }
            $this->substitution_table[$this->plaintext_key{$i}] = str_split($str);
        }
        return $this->substitution_table;
    }

    /**
     * Get a substitution table entry
     *
     * @param int $pos
     * @return string
     */
    public function getSubstitutionTableEntry($pos)
    {
        $str = $this->plaintext_key;
        if ($pos != 0) {
            $str = Helper::rotate($str, $pos);
        }
        return $str;
    }

    /**
     * Debugging
     *
     * @return string
     */
    public function substitutionTableToString()
    {
        return Helper::tableToString(
            $this->getSubstitutionTable(), array(), array(), '"Tabula Recta" Table'
        );
    }

    public function find($a, $b)
    {
        $pos    = strpos($this->plaintext_key, $a);
        $key    = $this->getSubstitutionTableEntry($pos);
        $table  = new SimpleCipher($this->plaintext_key, $key);
        return $table->crypt($b);
    }

    public function retrieve($a, $b)
    {
        $pos    = strpos($this->plaintext_key, $b);
        $key    = $this->getSubstitutionTableEntry($pos);
        $table  = new SimpleCipher($this->plaintext_key, $key);
        return $table->decrypt($a);
    }

}

// Endfile