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
 * Square substitution: "Polybe square cipher" like
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class SquareSubstitution
    extends SimpleSubstitution
{

    public function __construct($plaintext_key = null, $flag = Cryptography::PROCESS_ALL)
    {
        if (is_null($plaintext_key)) {
            $plaintext_key = Cryptography::ALPHABET_UPPER.Cryptography::SPACE;
        }
        $this
            ->_setPlaintextKey($plaintext_key)
            ->setFlag($flag)
            ;
    }

    public function substitutionTableToString($with_indices = true, $separator = ' | ', $eol = "\n")
    {
        $table = $this->_getSubstitutionTable();
        return Cryptography::tableToString(
            array_keys($table),
            array_values($table),
            $with_indices, $separator, $eol
        );
    }

    protected function _getSubstitutionTable()
    {
        $size   = ceil(sqrt(strlen($this->plaintext_key)));
        $table  = array();
        $pt     = str_split($this->plaintext_key);
        foreach ($pt as $i=>$k) {
            $j = $i+1;
            if ($j<=$size) {
                $table[$k] = '1'.(($i % $size)+1);
            } else {
                $table[$k] = (floor($i/$size)+1).(($i % $size)+1);
            }
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
        if ($this->flag & Cryptography::KEEP_SPACES) {
            $parts  = explode(Cryptography::SPACE, $str);
            $s      = array();
            foreach ($parts as $part) {
                $s      = array_merge($s, str_split($part, 2));
                $s[]    = Cryptography::SPACE;
            }
        } else {
            $s = str_split($str, 2);
        }
        $r = array();
        foreach ($s as $l) {
            if ($l==Cryptography::SPACE && ($this->flag & Cryptography::KEEP_SPACES)) {
                $r[] = Cryptography::SPACE;
            } else {
                $r[] = array_search((string) $l, $table);
            }
        }
        return implode('', $r);
    }
}

// Endfile