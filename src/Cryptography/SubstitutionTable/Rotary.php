<?php
/**
 * This file is part of the Cryptography package.
 *
 * Copyleft (ↄ) 2014-2015 Pierre Cassat <me@e-piwi.fr> and contributors
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * The source code of this package is available online at 
 * <http://github.com/atelierspierrot/cryptography>.
 */

namespace Cryptography\SubstitutionTable;

use \Cryptography\Cryptography;
use \Cryptography\Helper;
use \Cryptography\SubstitutionTable\Simple as SimpleSubstitutionTable;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
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