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

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Simple
    extends AbstractSubstitutionTable
{

    /**
     * @param string $plaintext_key
     * @param array $substitution_table
     */
    public function __construct(
        $plaintext_key = '', $substitution_table = array()
    ) {
        if (is_string($substitution_table)) {
            $substitution_table = str_split($substitution_table);
        }
        parent::__construct($plaintext_key, array($substitution_table));
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
        $pt     = is_string($this->plaintext_key) ? str_split($this->plaintext_key) : $this->plaintext_key;
        foreach ($pt as $i=>$k) {
            foreach ($this->substitutions as $j=>$l) {
                $table[$k][] = $this->substitutions[$j][$i];
            }
            if (count($table[$k])==1) {
                $table[$k] = array_shift($table[$k]);
            }
        }
        return $table;
    }

}

// Endfile