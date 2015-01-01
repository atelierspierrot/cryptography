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