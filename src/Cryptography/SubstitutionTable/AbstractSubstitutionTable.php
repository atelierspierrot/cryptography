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