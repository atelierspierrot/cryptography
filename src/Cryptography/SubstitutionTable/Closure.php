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
class Closure
    extends AbstractSubstitutionTable
{

    /**
     * @var callable The closure used for encryption
     */
    protected $crypt_closure    = null;

    /**
     * @var callable The closure used for decryption
     */
    protected $decrypt_closure  = null;

    /**
     * @param string $plaintext_key
     * @param null $crypt_closure
     * @param null $decrypt_closure
     */
    public function __construct(
        $plaintext_key = '', $crypt_closure = null, $decrypt_closure = null
    ) {
        parent::__construct($plaintext_key, array());
        if (!is_null($crypt_closure)) {
            $this->setCryptClosure($crypt_closure);
            if (is_null($decrypt_closure)) {
                $this->setDecryptClosure($crypt_closure);
            }
        }
        if (!is_null($decrypt_closure)) {
            $this->setDecryptClosure($decrypt_closure);
        }
    }

    /**
     * Define the encryption closure
     *
     * @param callable $fct
     * @return $this
     */
    public function setCryptClosure(callable $fct)
    {
        $this->crypt_closure = $fct;
        return $this;
    }

    /**
     * Define the decryption closure
     *
     * @param callable $fct
     * @return $this
     */
    public function setDecryptClosure(callable $fct)
    {
        $this->decrypt_closure = $fct;
        return $this;
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
        $pt     = str_split($this->plaintext_key);
        foreach ($pt as $k) {
            $fct = ($action==Cryptography::CRYPT) ? $this->crypt_closure : $this->decrypt_closure;
            $table[$k] = call_user_func($fct, $k, $this);
        }
        return $table;
    }

}

// Endfile