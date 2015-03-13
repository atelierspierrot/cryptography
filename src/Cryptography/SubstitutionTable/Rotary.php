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
use \Cryptography\SubstitutionTable\Simple as SimpleSubstitutionTable;

/**
 * @author  piwi <me@e-piwi.fr>
 */
class Rotary
    extends SimpleSubstitutionTable
{

    /**
     * @var int The rotation value
     */
    protected $rotation     = 1;

    /**
     * @param string $plaintext_key
     * @param int $rotation
     */
    public function __construct($plaintext_key = '', $rotation = 1)
    {
        parent::__construct($plaintext_key, array(str_split($plaintext_key)));
        $this->setRotation($rotation);
    }

    /**
     * Define the rotation value
     *
     * @param $rotation
     * @return $this
     */
    public function setRotation($rotation)
    {
        $this->rotation = $rotation;
        return $this;
    }

    /**
     * Make a run of rotation
     *
     * @param null $rotation
     * @return $this
     */
    public function rotate($rotation = null)
    {
        if (is_null($rotation)) {
            $rotation = $this->rotation;
        }
        $cipher = $this->getSubstitutions();
        $this->setSubstitutions(
            array(Helper::rotate($cipher[0], $rotation))
        );
        return $this;
    }

}

// Endfile