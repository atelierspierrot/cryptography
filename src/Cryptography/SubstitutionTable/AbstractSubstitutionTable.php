<?php
/**
 * PHP cryptography
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/cryptography>
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