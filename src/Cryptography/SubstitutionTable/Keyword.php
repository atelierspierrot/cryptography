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
use \Cryptography\SubstitutionTable\Simple as SimpleSubstitutionTable;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
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