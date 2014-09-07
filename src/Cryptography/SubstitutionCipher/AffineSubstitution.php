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
class AffineSubstitution
    extends SimpleSubstitution
{

    protected $a;
    protected $b;

    public function __construct($a, $b, $plaintext_key = null)
    {
        if (is_null($plaintext_key)) {
            $plaintext_key = Cryptography::ALPHABET_UPPER.Cryptography::SPACE;
        }
        if ($a<=0 || $b<=0) {
            throw new \InvalidArgumentException(
                sprintf('The values of the Affine substitution can not be negative or null (got a="%s" and b="%s")', $a, $b)
            );
        }
        if (($a % 2)==0 || ($a % 13)==0) {
            throw new \InvalidArgumentException(
                sprintf('The first value of the Affine substitution can not be divisible by 2 or 13 (got "%s")', $a)
            );
        }
        $this->a = $a;
        $this->b = $b;
        $this->plaintext_key = $plaintext_key;
    }

    public function crypt($str)
    {
        $str    = $this->_prepare($str);
        $table  = str_split($this->plaintext_key);
        $s      = str_split($str);
        $r      = array();
        foreach ($s as $l) {
            $orig_i = array_search($l, $table);
            $t = ($this->a * $orig_i + $this->b);
            $final_i = ($this->a * $orig_i + $this->b) % 26;
//echo "l: $l | orig: $orig_i | t: $t | final: $final_i".PHP_EOL;
            $r[] = $table[$final_i];
        }
        return implode('', $r);
    }

    /*
     * FAILED
     */
    public function decrypt($str)
    {
        $str    = $this->_prepare($str);
        $table  = str_split($this->plaintext_key);
        $s      = str_split($str);
        $r      = array();
        $t      = 1 / ($this->a % 26);
        foreach ($s as $l) {
            $orig_i = array_search($l, $table);
            $final_i = abs($t * $orig_i - $t * $this->b);
//echo "l: $l | orig: $orig_i | t: $t | final: $final_i".PHP_EOL;
            $r[] = $table[$final_i];
        }
        return implode('', $r);
    }

}

// Endfile