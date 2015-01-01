<?php
/**
 * This file is part of the Cryptography package.
 *
 * Copyleft (ↄ) 2014-2015 Pierre Cassat <me@e-piwi.fr> and contributors
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * The source code of this package is available online at 
 * <http://github.com/atelierspierrot/cryptography>.
 */

namespace Cryptography;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
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

// Endfile