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
use \Cryptography\SubstitutionCipher\Inversion;
use \Cryptography\SubstitutionCipher\AbstractSubstitutionCipherPreset;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class AtbashCipher
    extends AbstractSubstitutionCipherPreset
{

    public function __construct(
        $plaintext_key = Cryptography::ALPHABET_UPPER
    ) {
        $this->substitution = new Inversion(
            $plaintext_key,
            Cryptography::KEEP_SPACES
        );
    }

}

// Endfile