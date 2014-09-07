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

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class SimpleSubstitution
    extends AbstractSubstitutionCipher
{

    public function __construct($plaintext_key, $cipher_key, $flag = Cryptography::PROCESS_ALL)
    {
        $this
            ->_setPlaintextKey($plaintext_key)
            ->_setCipherKey($cipher_key)
            ->setFlag($flag)
            ;
    }

    public function substitutionTableToString($with_indices = true, $separator = ' | ', $eol = "\n")
    {
        return Cryptography::tableToString(
            str_split($this->plaintext_key),
            str_split($this->cipher_key),
            $with_indices, $separator, $eol
        );
    }

    protected function _getSubstitutionTable()
    {
        $table  = array();
        $pt     = str_split($this->plaintext_key);
        $ct     = str_split($this->cipher_key);
        foreach ($pt as $i=>$k) {
            $table[$k] = $ct[$i];
        }
        return $table;
    }

    public function crypt($str)
    {
        $str    = $this->_prepare($str);
        $table  = $this->_getSubstitutionTable();
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

    public function decrypt($str)
    {
        $str    = $this->_prepare($str);
        $table  = $this->_getSubstitutionTable();
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