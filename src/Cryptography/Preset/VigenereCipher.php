<?php
/**
 * PHP cryptography
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/cryptography>
 */

namespace Cryptography\Preset;

use \Cryptography\Cryptography;
use \Cryptography\Helper;
use \Cryptography\SubstitutionCipher\Simple;
use \Cryptography\SubstitutionTable\TabulaRecta;
use \Cryptography\SubstitutionCipher\AbstractSubstitutionCipherPreset;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class VigenereCipher
    extends AbstractSubstitutionCipherPreset
{

    protected $plaintext_key;

    protected $user_key;

    protected $tabula_recta;

    public function __construct(
        $user_key,
        $plaintext_key = Cryptography::ALPHABET_UPPER
    ) {
        $this
            ->setPlaintextKey($plaintext_key)
            ->setUserKey($user_key)
            ;
        $this->tabula_recta = new TabulaRecta(
            $this->plaintext_key
        );
    }

    /**
     * Prepare the string to crypt/decrypt: this will return the string according to keys case
     *
     * @param $str
     * @return array|string
     */
    protected function _prepare($str)
    {
        return Helper::homogenizeString($str, $this->plaintext_key);
    }

    public function setPlaintextKey($str)
    {
        $this->plaintext_key = $str;
        return $this;
    }

    public function setUserKey($str)
    {
        $this->user_key = Helper::stripSpaces($str);
        return $this;
    }

    public function crypt($str, $as_array = false)
    {
        $r          = array();
        $str        = $this->_prepare($str);
        $key_length = strlen($this->user_key);
        $words      = explode(' ', $str);
        $counter = 0;
        foreach ($words as $word) {
            $letters = str_split($word);
            foreach ($letters as $letter) {
                $pos = ($counter % $key_length);
                $r[] = $this->tabula_recta->find(
                    $letter,$this->user_key{$pos}
                );
                $counter++;
            }
            $r[] = ' ';
        }
        return ($as_array ? $r : implode('', $r));
    }

    public function decrypt($str, $as_array = false)
    {
        $r          = array();
        $str        = $this->_prepare($str);
        $key_length = strlen($this->user_key);
        $words      = explode(' ', $str);
        $counter = 0;
        foreach ($words as $word) {
            $letters = str_split($word);
            foreach ($letters as $letter) {
                $pos = ($counter % $key_length);
                $r[] = $this->tabula_recta->retrieve(
                    $letter, $this->user_key{$pos}
                );
                $counter++;
            }
            $r[] = ' ';
        }
        return ($as_array ? $r : implode('', $r));
    }

}

// Endfile