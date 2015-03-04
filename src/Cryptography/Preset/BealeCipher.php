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
use \Cryptography\SubstitutionCipher\Book;
use \Cryptography\SubstitutionCipher\AbstractSubstitutionCipherPreset;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class BealeCipher
    extends AbstractSubstitutionCipherPreset
{

    public function __construct(
        $plaintext_key = Cryptography::ALPHABET_UPPER
    ) {
        $this->substitution = new Book(
            $plaintext_key,
            Cryptography::KEEP_SPACES,
            Cryptography::SCOPE_LETTER,
            Cryptography::ALL_OCCURRENCES,
            Cryptography::ALPHABET_UPPER
        );
    }

    public function crypt($str)
    {
        $crypted = implode(' ', $this->substitution->crypt($str, true));
        return Helper::stripSpaces($crypted, ' ');
    }

    public function decrypt($str)
    {
        $decrypted = $this->substitution->decrypt(explode(' ', $str), true);
        return implode(' ', $decrypted);
    }

}

// Endfile