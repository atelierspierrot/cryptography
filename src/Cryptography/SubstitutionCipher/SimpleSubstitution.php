<?php
/**
 * PHP cryptography
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/cryptography>
 */

namespace Cryptography\SubstitutionCipher;

use \Cryptography\Cryptography;
use \Cryptography\Helper;
use \Cryptography\SubstitutionTable\SimpleSubstitutionTable;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class SimpleSubstitution
    extends AbstractSubstitutionCipher
{

    /**
     * @var SimpleSubstitutionTable The substitution table object used to crypt/decrypt
     */
    protected $substitution_table;

    /**
     * @param string $plaintext_key
     * @param array $cipher_key
     * @param int $flag
     */
    public function __construct($plaintext_key = '', $cipher_key = array(), $flag = Cryptography::PROCESS_ALL)
    {
        $this
            ->setSubstitutionTable(
                new SimpleSubstitutionTable($plaintext_key, $cipher_key)
            )
            ->setFlag($flag)
            ;
    }

    /**
     * Debugging the substitution table used
     *
     * @return string
     */
    public function substitutionTableToString()
    {
        return $this->substitution_table->substitutionTableToString();
    }

    /**
     * Crypt a string
     *
     * @param $str
     * @return mixed|string
     */
    public function crypt($str)
    {
        $str    = $this->_prepare($str);
        $table  = $this->substitution_table->getSubstitutionTable();
        $s      = str_split($str);
        $r      = array();
        foreach ($s as $l) {
            if ($l==Cryptography::SPACE && ($this->flag & Cryptography::KEEP_SPACES)) {
                $r[] = Cryptography::SPACE;
            } else {
                $r[] = $table[$l];
            }
        }
        return implode('', $r);
    }

    /**
     * Decrypt a string
     *
     * @param $str
     * @return mixed|string
     */
    public function decrypt($str)
    {
        $str    = $this->_prepare($str);
        $table  = $this->substitution_table->getSubstitutionTable();
        $s      = str_split($str);
        $r      = array();
        foreach ($s as $l) {
            if ($l==Cryptography::SPACE && ($this->flag & Cryptography::KEEP_SPACES)) {
                $r[] = Cryptography::SPACE;
            } else {
                $r[] = array_search($l, $table);
            }
        }
        return implode('', $r);
    }

}

// Endfile