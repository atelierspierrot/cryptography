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