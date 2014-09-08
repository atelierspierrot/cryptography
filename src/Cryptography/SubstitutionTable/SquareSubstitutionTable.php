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
class SquareSubstitutionTable
    extends SimpleSubstitutionTable
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