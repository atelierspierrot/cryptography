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
use \Cryptography\SubstitutionTable\Simple as SimpleSubstitutionTable;

/**
 * Inversion substitution: "Atbash cipher"
 *
 * @author  piwi <me@e-piwi.fr>
 */
class Inversion
    extends Simple
{

    /**
     * @param null $plaintext_key
     * @param array|int $flag
     */
    public function __construct($plaintext_key = null, $flag = Cryptography::PROCESS_ALL)
    {
        if (is_null($plaintext_key)) {
            $plaintext_key = Cryptography::ALPHABET_UPPER.Cryptography::SPACE;
        }
        $this
            ->setSubstitutionTable(
                new SimpleSubstitutionTable($plaintext_key)
            )
            ->setFlag($flag)
        ;
    }

    /**
     * Reset the substitution table to original form
     *
     * @return $this
     */
    protected function _reset()
    {
        parent::_reset();
        $this->substitution_table->setSubstitutions(
            array(str_split(strrev($this->substitution_table->getPlaintextKey())))
        );
        return $this;
    }

}

// Endfile