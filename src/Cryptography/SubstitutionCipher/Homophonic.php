<?php
/**
 * This file is part of the Cryptography package.
 *
 * Copyright (c) 2014-2016 Pierre Cassat <me@e-piwi.fr> and contributors
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
use \Cryptography\SubstitutionTable\Simple as SimpleSubstitutionTable;

/**
 * @author  piwi <me@e-piwi.fr>
 */
class Homophonic
    extends Simple
{

    /**
     * @var int Maximum of keys values
     */
    protected $max = 0;

    /**
     * @var int Minimum of keys values
     */
    protected $min = 0;

    /**
     * The keys here must be defined as an array like:
     *
     *      array(
     *          A => array( 1 , 17 , 87 ...)
     *      )
     *
     * @param array $keys_table
     * @param int $flag
     */
    public function __construct(array $keys_table, $flag = Cryptography::PROCESS_ALL)
    {
        $this
            ->setSubstitutionTable(
                new SimpleSubstitutionTable(
                    array_keys($keys_table),
                    $this->_buildCipherKey(array_values($keys_table))
                )
            )
            ->setFlag($flag)
        ;
    }

    /**
     * Build the cipher key from the constructor `$keys_table`
     *
     * @param $table
     * @return mixed
     * @throws \InvalidArgumentException if the substitution keys seems malformed
     */
    protected function _buildCipherKey($table)
    {
        if (!is_array($table)) {
            throw new \InvalidArgumentException(
                sprintf('Cipher key for Homophonic substitution must be an array (got "%s")!', gettype($table))
            );
        }
        $values = array();
        foreach ($table as $items) {
            if (empty($items)) {
                throw new \InvalidArgumentException(
                    'Correspondence list for Homophonic substitution must not be empty!'
                );
            }
            foreach ($items as $item) {
                if (in_array($item, $values)) {
                    throw new \InvalidArgumentException(
                        sprintf('Duplication of correspondence is not allowed for Homophonic substitution (found duplicated "%s")', $item)
                    );
                }
                if ($item < $this->min) {
                    $this->min = $item;
                }
                if ($item > $this->max) {
                    $this->max = $item;
                }
                $values[] = $item;
            }
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
        foreach ($ciphers as $i=>$list) {
            $ciphers[$i] = implode('-', $list);
        }
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
                $r[] = $table[$l][array_rand($table[$l])];
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
                foreach ($table as $index=>$items) {
                    if (in_array($l, $items)) {
                        $r[] = $index;
                    }
                }
            }
        }
        return ($as_array ? $r : implode('', $r));
    }

/*/
// try to retrieve all possible results
    private $_table = array();

    protected function _getOrgnizedTable()
    {
        if (empty($this->_table)) {
            $this->_table = $this->_prepareSubstitutionTable(
                $this->substitution_table->getSubstitutionTable()
            );
        }
        return $this->_table;
    }

    public function decrypt($str, $as_array = false)
    {
        $table  = $this->_getOrgnizedTable();
        $str    = $this->_prepare($str);
        $original_str = $str;

        $min_l  = strlen($this->min);
        $max_l  = strlen($this->max);
        $results = array();
        $r      = array();

        while (strlen($str)>0) {
            if ($str{0} == Cryptography::SPACE && ($this->flag & Cryptography::KEEP_SPACES)) {
                $r[] = Cryptography::SPACE;
            } else {
                for ($i=$min_l; $i<=$max_l; $i++) {
                    $l = substr($str, 0, $i);
                    $str = substr($str, strlen($i));

                    if (array_key_exists($l, $this->_table)) {
                        $r[] = $this->_table[$l];
                    }
                }
            }
        }

        return ($as_array ? $r : implode('', $r));

        $s      = str_split($str, strlen($this->min));
        foreach ($s as $l) {
            if ($l==Cryptography::SPACE && ($this->flag & Cryptography::KEEP_SPACES)) {
                $r[] = Cryptography::SPACE;
            } else {
                foreach ($table as $index=>$items) {
                    if (in_array($l, $items)) {
                        $r[] = $index;
                    }
                }
            }
        }
        return ($as_array ? $r : implode('', $r));
    }

    protected function _prepareSubstitutionTable(array $table)
    {
        $r = array();
        foreach ($table as $i=>$v) {
            if (is_array($v)) {
                foreach ($v as $k) {
                    $r[$k] = $i;
                }
            } else {
                $r[$v] = $i;
            }
        }
        ksort($r);
        return $r;
    }

    protected function _decryptRun($str, $pos = 0)
    {
        $table  = $this->substitution_table->getSubstitutionTable();
        $min_l  = strlen($this->min);
        $max_l  = strlen($this->max);
        $original_str = $str;
        $results = array();


        if ($str{0} == Cryptography::SPACE && ($this->flag & Cryptography::KEEP_SPACES)) {
            $r[] = Cryptography::SPACE;
        } else {
            for ($i=$min_l; $i<=$max_l; $i++) {
                $l = substr($str, 0, $i);
                $str = substr($str, strlen($i));

                foreach ($table as $index=>$items) {
                    if (in_array($l, $items)) {
                        $r[] = $index;
                    }
                }
            }
        }

        return ($as_array ? $r : implode('', $r));

        $s      = str_split($str, strlen($this->min));
        $r      = array();
        foreach ($s as $l) {
            if ($l==Cryptography::SPACE && ($this->flag & Cryptography::KEEP_SPACES)) {
                $r[] = Cryptography::SPACE;
            } else {
                foreach ($table as $index=>$items) {
                    if (in_array($l, $items)) {
                        $r[] = $index;
                    }
                }
            }
        }
        return ($as_array ? $r : implode('', $r));
    }

//*/
}
