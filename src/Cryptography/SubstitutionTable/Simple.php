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

namespace Cryptography\SubstitutionTable;

use \Cryptography\Cryptography;

/**
 * @author  piwi <me@e-piwi.fr>
 */
class Simple
    extends AbstractSubstitutionTable
{

    /**
     * @param string $plaintext_key
     * @param array $substitution_table
     */
    public function __construct(
        $plaintext_key = '', $substitution_table = array()
    ) {
        if (is_string($substitution_table)) {
            $substitution_table = str_split($substitution_table);
        }
        parent::__construct($plaintext_key, array($substitution_table));
    }

    /**
     * @return array|mixed|string
     */
    public function getPlaintextKey()
    {
        return $this->plaintext_key;
    }

    /**
     * @return array|mixed
     */
    public function getSubstitutions()
    {
        return $this->substitutions;
    }

    /**
     * @param int $action
     * @return array|mixed
     */
    public function getSubstitutionTable($action = Cryptography::CRYPT)
    {
        $table  = array();
        $pt     = is_string($this->plaintext_key) ? str_split($this->plaintext_key) : $this->plaintext_key;
        foreach ($pt as $i=>$k) {
            foreach ($this->substitutions as $j=>$l) {
                $table[$k][] = $this->substitutions[$j][$i];
            }
            if (count($table[$k])==1) {
                $table[$k] = array_shift($table[$k]);
            }
        }
        return $table;
    }
}
