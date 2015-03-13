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
use \Cryptography\SubstitutionTable\Simple as SimpleSubstitutionTable;

/**
 * @author  piwi <me@e-piwi.fr>
 */
class Keyword
    extends SimpleSubstitutionTable
{

    /**
     * @param string $plaintext_key
     * @param string $user_key
     */
    public function __construct(
        $plaintext_key = '', $user_key = ''
    ) {
        $user_keys = str_split($user_key);
        parent::__construct($plaintext_key, $user_keys);
    }

    /**
     * @param int $action
     * @return array|mixed
     */
    public function getSubstitutionTable($action = Cryptography::CRYPT)
    {
        $table      = array();
        $keys       = $this->getSubstitutions();
        $key_length = count($keys);
        $parts      = str_split($this->getPlaintextKey());
        foreach ($parts as $i=>$part) {
            $pos = (($i + 1) % $key_length);
            $table[$part] = $keys[$pos];
        }
        return $table;
    }

}

// Endfile