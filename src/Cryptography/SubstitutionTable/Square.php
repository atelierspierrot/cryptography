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

use \Cryptography\Cryptography;
use \Cryptography\Helper;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Square
    extends Simple
{

    /**
     * @param string $plaintext_key
     */
    public function __construct($plaintext_key = '')
    {
        parent::__construct($plaintext_key);
        $this->_buildSubstitutionTable();
    }

    /**
     * @return $this
     */
    protected function _buildSubstitutionTable()
    {
        $size   = ceil(sqrt(strlen($this->plaintext_key)));
        $pt     = str_split($this->plaintext_key);
        $table  = array();
        foreach ($pt as $i=>$k) {
            $j = $i+1;
            if ($j<=$size) {
                $table[$i] = '1'.(($i % $size)+1);
            } else {
                $table[$i] = (floor($i/$size)+1).(($i % $size)+1);
            }
        }
        $this->setSubstitutions(array($table));
        return $this;
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
            $table[$k] = $this->substitutions[0][$i];
        }
        return $table;
    }

}

// Endfile