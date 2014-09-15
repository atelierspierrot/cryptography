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
use \Cryptography\SubstitutionTable\Closure as ClosureSubstitutionTable;

/**
 * This use an affine function to calculate the cipher encoding:
 *
 *      y = a * x + b
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Affine
    extends Simple
{

    /**
     * @var \Cryptography\SubstitutionTable\Closure The substitution table object used to crypt/decrypt
     */
    protected $substitution_table;

    /**
     * @var int The coefficient of the affine function
     */
    protected $a;

    /**
     * @var int The ordinate of the affine function
     */
    protected $b;

    /**
     * @var array An internal cache array to light-weight calculation
     */
    private $_cache = array();

    /**
     * @param string $a
     * @param array $b
     * @param null $plaintext_key
     * @param int $flag
     * @throws \InvalidArgumentException if `$a` or `$b` does not fit requirements
     */
    public function __construct($a, $b, $plaintext_key = null, $flag = Cryptography::PROCESS_ALL)
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
        $_this = $this;
        $this
            ->setSubstitutionTable(
                new ClosureSubstitutionTable(
                    $plaintext_key,
                    function ($l) use ($_this) { return $_this->_cryptVal($l); },
                    function ($l) use ($_this) { return $_this->_decryptVal($l); }
                )
            )
            ->setFlag($flag)
        ;
    }

    /**
     * Simple reset method: nothing to do
     *
     * @return $this
     */
    protected function _reset()
    {
        return $this;
    }

    /**
     * Callback method used to encrypt each part of the original string, called as a closure
     *
     * @param $t
     * @return mixed
     */
    protected function _cryptVal($t)
    {
        if (!array_key_exists($t, $this->_cache)) {
            $table  = str_split($this->getSubstitutionTable()->getPlaintextKey());
            $orig_i = array_search($t, $table);
            $v = ($this->a * $orig_i + $this->b);
            $fv = ($this->a * $orig_i + $this->b) % 26;
            $this->_cache[$t] = $table[$fv];
//echo "t: $t | orig: $orig_i | v: $v | final: $fv".PHP_EOL;
        }
        return $this->_cache[$t];
    }

    /**
     * Callback method used to decrypt each part of the original string, called as a closure
     *
     * @param $t
     * @return mixed
     */
    protected function _decryptVal($t)
    {
        if (!in_array($t, $this->_cache)) {
            $table  = str_split($this->getSubstitutionTable()->getPlaintextKey());
            $orig_i = array_search($t, $table);
            $v      = 1 / ($this->a % 26);
            $fv = abs($v * $orig_i - $v * $this->b);
//echo "t: $t | orig: $orig_i | v: $v | final: $fv".PHP_EOL;
            $this->_cache[$t] = $table[$fv];
        }
        return array_search($t, $this->_cache);
    }

    /**
     * Crypt a string
     *
     * @param   string  $str        The string to crypt
     * @param   bool    $as_array   Get the result as an array or a string (default)
     * @return  array|string
     */
    public function crypt($str, $as_array = false)
    {
        $str    = $this->_prepare($str);
        $s      = str_split($str);
        $r      = array();
        foreach ($s as $l) {
            $r[] = $this->_cryptVal($l);
        }
        return ($as_array ? $r : implode('', $r));
    }

    /**
     * Decrypt a string
     *
     * @param   string  $str        The string to decrypt
     * @param   bool    $as_array   Get the result as an array or a string (default)
     * @return  array|string
     *
     * @TODO
     */
    public function decrypt($str, $as_array = false)
    {
        $str    = $this->_prepare($str);
        $s      = str_split($str);
        $r      = array();
        foreach ($s as $l) {
            $r[] = $this->_decryptVal($l);
        }
        return ($as_array ? $r : implode('', $r));
    }

}

// Endfile