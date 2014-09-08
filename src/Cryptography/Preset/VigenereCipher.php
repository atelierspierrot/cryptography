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
use \Cryptography\Helper;
use \Cryptography\Preset\TabulaRecta;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class VigenereCipher
    extends PolyAlphabeticSubstitution
{

    protected $user_key;

    protected $tabula_recta;

    public function __construct($user_key, $plaintext_key = Cryptography::ALPHABET_UPPER)
    {
        $this
            ->setUserKey($user_key)
            ->_setPlaintextKey($plaintext_key)
            ->setFlag(Cryptography::KEEP_SPACES)
            ;
    }

    public function setUserKey($str)
    {
        $this->user_key = $str;
        return $this;
    }

}

// Endfile