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