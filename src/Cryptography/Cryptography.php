<?php
/**
 * PHP cryptography
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/cryptography>
 */

namespace Cryptography;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Cryptography
{

    /**
     * Used to process the "crypt" action
     */
    const CRYPT             = 1;

    /**
     * Used to process the "decrypt" action
     */
    const DECRYPT           = 2;

    /**
     * Used to process the entry string "as is"
     */
    const PROCESS_ALL       = 0;

    /**
     * Used to process the entry string keeping the spaces character
     */
    const KEEP_SPACES       = 1;

    /**
     * Space character
     */
    const SPACE             = ' ';

    /**
     * Numbers characters string
     */
    const NUMBERS           = '0123456789';

    /**
     * Uppercase alphabet
     */
    const ALPHABET_UPPER    = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * Lowercase alphabet
     */
    const ALPHABET_LOWER    = 'abcdefghijklmnopqrstuvwxyz';

    /**
     * Common special characters
     */
    const SPECIAL_CHARACTERS= '.,;:?!+-=_%&§#*$`"\'()[]{}<>@';

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