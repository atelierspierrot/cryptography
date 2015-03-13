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

namespace Cryptography\Tools;

use \Cryptography\Cryptography;
use \Cryptography\Helper;
use \Maths\Arithmetic\Helper as MathsHelper;

/**
 * @author  piwi <me@e-piwi.fr>
 */
class StringBuilder
{

    protected $flag;

    protected $plaintext_keys;

    protected $table;

    protected $conversion_table;

    public function __construct(
        $characters,
        $flag = Cryptography::TYPE_COMBINATION
    ) {
        if (is_string($characters)) {
            $characters = str_split($characters);
        }
        $this
            ->setPlaintextKeys($characters)
            ->setFlag($flag)
            ;
    }

    public function setFlag($flag)
    {
        $this->flag = $flag;
        return $this;
    }

    public function setPlaintextKeys(array $characters)
    {
        $this->plaintext_keys = $characters;
        $this->conversion_table = array();
        return $this;
    }

    public function process($limit = 0)
    {
        if ($this->flag & Cryptography::TYPE_COMBINATION) {
            return $this->processCombination($limit);
        } else {
            return $this->processPermutation($limit);
        }
    }

    protected function _getConversionTable()
    {
        if (empty($this->conversion_table)) {
            $this->conversion_table = array();
            $values = $this->plaintext_keys;
            $count  = count($values);
            if ($count>=2 && $count<=36) {
                foreach ($values as $k=>$v) {
                    $this->conversion_table[base_convert($k, 10, $count)] = $v;
                }
            }
        }
        return $this->conversion_table;
    }

    public function getCombinationNumber()
    {
        $c = count($this->plaintext_keys);
        return pow($c, $c);
    }

    public function processCombination($limit = 0)
    {
        $values = $this->plaintext_keys;
        $count  = count($values);
        $max    = pow($count, $count);
        $this->table = array();
        for ($i=0; $i<$max; $i++) {
            $this->table[] = $this->doProcessCombination($i);
        }
        return $this->table;
    }

    public function doProcessCombination($i = 0)
    {
        $values         = $this->plaintext_keys;
        $c              = $this->_getConversionTable();
        $count          = count($values);
        if ($count>=2 && $count<=36) {
            $combination    = base_convert($i, 10, $count);
            $combination    = str_pad($combination, $count, "0", STR_PAD_LEFT);
            return strtr($combination, $c);
        } else {
            return null;
        }
    }

    public function getPermutationNumber()
    {
        return MathsHelper::factorial(count($this->plaintext_keys));
    }

    public function processPermutation($limit = 0)
    {
        $this->table = $this->doProcessPermutation($this->plaintext_keys);
        return $this->table;
    }

    public function doProcessPermutation($items)
    {
        $this->doProcessPermutationRun($items, $results);
        return $results;
    }

    /**
     * @param $items
     * @param array $results
     * @param array $perms
     * @see http://stackoverflow.com/questions/5506888/permutations-all-possible-sets-of-numbers
     */
    public function doProcessPermutationRun($items, &$results = array(), $perms = array())
    {
        if (empty($items)) {
            $results[] = implode('', $perms);
        }  else {
            for ($i=(count($items) - 1); $i>=0; --$i) {
                $newitems   = $items;
                $newperms   = $perms;
                list($foo)  = array_splice($newitems, $i, 1);
                array_unshift($newperms, $foo);
                $this->doProcessPermutationRun($newitems, $results, $newperms);
            }
        }
    }

}

// Endfile