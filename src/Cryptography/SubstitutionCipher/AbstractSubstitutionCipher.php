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
use \Cryptography\SubstitutionTable\AbstractSubstitutionTable;
use \Cryptography\Helper;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
abstract class AbstractSubstitutionCipher
{

    /**
     * @var AbstractSubstitutionTable The substitution table object used to crypt/decrypt
     */
    protected $substitution_table;

    /**
     * @var int The action "to do" : `Cryptography::CRYPT` or `Cryptography::DECRYPT`
     */
    protected $action;

    /**
     * @var int Behavior of the encryptor: `Cryptography::PROCESS_ALL` or `Cryptography::KEEP_SPACES`
     */
    protected $flag = Cryptography::PROCESS_ALL;

    /**
     * Define the cipher substitution table object
     *
     * @param AbstractSubstitutionTable $object
     * @return $this
     */
    public function setSubstitutionTable(AbstractSubstitutionTable $object)
    {
        $this->substitution_table = $object;
        return $this->_reset();
    }

    /**
     * Retrieve the cipher substitution object
     *
     * @return AbstractSubstitutionTable
     */
    public function getSubstitutionTable()
    {
        return $this->substitution_table;
    }

    /**
     * Define the behavior flag of the object
     *
     * @param $flag
     * @return $this
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;
        return $this->_reset();
    }

    /**
     * Generic method to dispatch the "to do" action
     *
     * @return mixed
     */
    public function process()
    {
        if ($this->action & Cryptography::DECRYPT) {
            return $this->decrypt();
        } elseif ($this->action & Cryptography::CRYPT) {
            return $this->crypt();
        }
    }

    /**
     * Reset the substitution tables when updating a key
     *
     * @return $this
     */
    protected function _reset()
    {
        if ($this->flag & Cryptography::KEEP_SPACES) {
            $this->substitution_table->setPlaintextKey(
                str_replace(Cryptography::SPACE, '', $this->substitution_table->getPlaintextKey())
            );

            $subs = $this->substitution_table->getSubstitutions();
            foreach ($subs as $i=>$sub) {
                if (is_string($sub)) {
                    $subs[$i] = str_replace(Cryptography::SPACE, '', $sub);
                } else {
                    if (in_array(Cryptography::SPACE, $sub)) {
                        $sub[array_search(Cryptography::SPACE, $sub)] = null;
                        $subs[$i] = $sub;
                    }
                }
            }
            $this->substitution_table->setSubstitutions($subs);
        }
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
        return Helper::homogenizeString($str, $this->substitution_table->getPlaintextKey());
    }

    /**
     * Crypt a string
     *
     * @param   string  $str        The string to crypt
     * @param   bool    $as_array   Get the result as an array or a string (default)
     * @return  array|string
     */
    abstract function crypt($str, $as_array = false);

    /**
     * Decrypt a string
     *
     * @param   string  $str        The string to decrypt
     * @param   bool    $as_array   Get the result as an array or a string (default)
     * @return  array|string
     */
    abstract function decrypt($str, $as_array = false);

}

// Endfile