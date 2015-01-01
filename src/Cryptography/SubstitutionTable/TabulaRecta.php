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

namespace Cryptography\SubstitutionTable;

use \Cryptography\Helper;
use \Cryptography\SubstitutionCipher\Simple as SimpleCipher;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
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