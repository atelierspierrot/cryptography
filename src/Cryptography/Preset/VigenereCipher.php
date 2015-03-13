<?php
/**
 * This file is part of the Cryptography package.
 *
 * Copyright (c) 2013-2015 Pierre Cassat <me@e-piwi.fr> and contributors
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * The source code of this package is available online at 
 * <http://github.com/atelierspierrot/cryptography>.
 */

namespace Cryptography\Preset;

use \Cryptography\Cryptography;
use \Cryptography\Helper;
use \Cryptography\SubstitutionCipher\Simple;
use \Cryptography\SubstitutionTable\TabulaRecta;
use \Cryptography\SubstitutionCipher\AbstractSubstitutionCipherPreset;

/**
 * @author  piwi <me@e-piwi.fr>
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