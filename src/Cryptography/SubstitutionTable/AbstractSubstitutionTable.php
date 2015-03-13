<?php
/**
 * This file is part of the Cryptography package.
 *
 * Copyright (c) 2014-2015 Pierre Cassat <me@e-piwi.fr> and contributors
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
 * @author  piwi <me@e-piwi.fr>
 */
abstract class AbstractSubstitutionTable
{

    /**
     * @var string|array The original plain text key
     */
    protected $plaintext_key        = null;

    /**
     * @var array The substitutions table to use
     */
    protected $substitutions        = array();

    /**
     * Load the plain text key and substitutions table
     *
     * @param string $plaintext_key
     * @param array $substitution_table
     */
    public function __construct(
        $plaintext_key = '', $substitution_table = array()
    ) {
        $this
            ->setPlaintextKey($plaintext_key)
            ->setSubstitutions($substitution_table)
            ;
    }

    /**
     * Define the plain text key
     *
     * @param $str
     * @return $this
     */
    public function setPlaintextKey($str)
    {
        $this->plaintext_key = $str;
        return $this;
    }

    /**
     * Define the substitutions table
     *
     * @param array $table
     * @return $this
     */
    public function setSubstitutions(array $table)
    {
        $this->substitutions = $table;
        return $this;
    }

    /**
     * Add an entry to the substitutions table
     *
     * @param $str
     * @return $this
     */
    public function addSubstitution($str)
    {
        $this->substitutions[] = $str;
        return $this;
    }

    /**
     * Debugging the substitutions table
     *
     * @return string
     */
    public function substitutionTableToString()
    {
        return Helper::tableToString(
            $this->substitutions, str_split($this->plaintext_key), array(), get_class($this).' :: Substitution Table'
        );
    }

    /**
     * Must return the original plain text key
     *
     * @return mixed
     */
    abstract public function getPlaintextKey();

    /**
     * Must return the substitutions table
     *
     * @return mixed
     */
    abstract public function getSubstitutions();

    /**
     * Must return a table of correspondence between plain text key and substitutions items
     *
     * @param int $action
     * @return mixed
     */
    abstract public function getSubstitutionTable($action = Cryptography::CRYPT);

}

// Endfile