<?php
/**
 * This file is part of the Cryptography package.
 *
 * Copyright (c) 2014-2016 Pierre Cassat <me@e-piwi.fr> and contributors
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

namespace Cryptography;

/**
 * @author  piwi <me@e-piwi.fr>
 */
class Cryptography
{

    // ----------------------
// action constants
// ----------------------

    /**
     * Used to process the "crypt" action
     */
    const CRYPT             = 1;

    /**
     * Used to process the "decrypt" action
     */
    const DECRYPT           = 2;

// ----------------------
// analysis constants
// ----------------------

    /**
     * Used to process a "letters" frequency analysis
     */
    const SCOPE_LETTER      = 1;

    /**
     * Used to process a "words" frequency analysis
     */
    const SCOPE_WORD        = 2;

    /**
     * Used to process a "random" frequency analysis
     */
    const SCOPE_RANDOM      = 4;

// ----------------------
// occurrences constants
// ----------------------

    /**
     * Used to choose the first occurrence of a table
     */
    const FIRST_OCCURRENCE = 1;

    /**
     * Used to choose the last occurrence of a table
     */
    const LAST_OCCURRENCE  = 2;

    /**
     * Used to choose a random occurrence in a table
     */
    const ALL_OCCURRENCES = 4;

// ----------------------
// processing constants
// ----------------------

    /**
     * Used to process the entry string "as is"
     */
    const PROCESS_ALL       = 0;

    /**
     * Used to process the entry string keeping the spaces character
     */
    const KEEP_SPACES       = 1;

// ----------------------
// usage constants
// ----------------------

    /**
     * Used to create permutations (use letters only once when constructing a string from a table)
     */
    const TYPE_PERMUTATION   = 0;

    /**
     * Used to create combinations (use letters multi-time when constructing a string from a table)
     */
    const TYPE_COMBINATION   = 1;

// ----------------------
// characters constants
// ----------------------

    /**
     * Space character
     */
    const SPACE             = ' ';

    /**
     * Numbers characters string
     */
    const NUMBERS           = '0123456789';

    /**
     * Numbers characters string for regular expressions
     */
    const NUMBERS_REGEX     = '0-9';

    /**
     * Uppercase alphabet
     */
    const ALPHABET_UPPER    = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * Uppercase alphabet for regular expressions
     */
    const ALPHABET_UPPER_REGEX = 'A-Z';

    /**
     * Lowercase alphabet
     */
    const ALPHABET_LOWER    = 'abcdefghijklmnopqrstuvwxyz';

    /**
     * Lowercase alphabet for regular expressions
     */
    const ALPHABET_LOWER_REGEX = 'a-z';

    /**
     * Common special characters
     */
    const SPECIAL_CHARACTERS = '.,;:?!+-=_%&§#*$`"\'()[]{}<>@|';

    /**
     * Common special characters for regular expressions
     */
    const SPECIAL_CHARACTERS_REGEX = '.|,|;|:|?|!|+|-|=|_|%|&|§|#|*|$|`|"|\'|(|)|[|]|{|}|<|>|@|\|';

    /**
     * @return string The full list of available characters
     */
    public static function getAllCharacters()
    {
        return
             Cryptography::ALPHABET_UPPER
            .Cryptography::ALPHABET_LOWER
            .Cryptography::NUMBERS
            .Cryptography::SPACE
            .Cryptography::SPECIAL_CHARACTERS;
    }
}
