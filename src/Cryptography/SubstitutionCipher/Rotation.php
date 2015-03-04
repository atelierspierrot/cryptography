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
use \Cryptography\Helper;
use \Cryptography\SubstitutionTable\Simple as SimpleSubstitutionTable;

/**
 * Rotation substitution: "Caesar cipher"
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Rotation
    extends Simple
{

    /**
     * @var int The rotation indice
     */
    protected $rotation_value = 0;

    /**
     * @param string $plaintext_key
     * @param array $rotation_value
     * @param int $flag
     */
    public function __construct($plaintext_key, $rotation_value, $flag = Cryptography::PROCESS_ALL)
    {
        $this
            ->setSubstitutionTable(
                new SimpleSubstitutionTable($plaintext_key)
            )
            ->_setRotationValue($rotation_value)
            ->setFlag($flag)
        ;
    }

    /**
     * Define the rotation indice
     *
     * @param $int
     * @return $this
     */
    protected function _setRotationValue($int)
    {
        $this->rotation_value = $int;
        return $this->_reset();
    }

    /**
     * Reset the substitution table to its original form
     *
     * @return $this
     */
    protected function _reset()
    {
        parent::_reset();
        $this->substitution_table->setSubstitutions(
            array(str_split(Helper::rotate(
                $this->substitution_table->getPlaintextKey(), ($this->rotation_value - 1)
            )))
        );
        return $this;
    }

    /**
     * Shortcut or `ROT13`
     *
     * @param $str
     * @return mixed|string
     */
    public static function rot13($str)
    {
        $_this = new self(Cryptography::getAllCharacters(),13);
        return $_this->crypt($str);
    }

}

// Endfile