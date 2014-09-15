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