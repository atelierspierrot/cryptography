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
use \Cryptography\SubstitutionTable\SquareSubstitutionTable;

/**
 * Square substitution: "Polybe square cipher" like
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class SquareSubstitution
    extends SimpleSubstitution
{

    /**
     * @var SquareSubstitutionTable The substitution table object used to crypt/decrypt
     */
    protected $substitution_table;

    /**
     * @param null $plaintext_key
     * @param array|int $flag
     */
    public function __construct($plaintext_key = null, $flag = Cryptography::PROCESS_ALL)
    {
        if (is_null($plaintext_key)) {
            $plaintext_key = Cryptography::ALPHABET_UPPER.Cryptography::SPACE;
        }
        $this
            ->setSubstitutionTable(
                new SquareSubstitutionTable($plaintext_key)
            )
            ->setFlag($flag)
            ;
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