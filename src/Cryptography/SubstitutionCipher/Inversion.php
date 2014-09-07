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

/**
 * Inversion substitution: "Atbash cipher"
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Inversion
    extends SimpleSubstitution
{

    public function __construct($plaintext_key = null, $flag = Cryptography::PROCESS_ALL)
    {
        if (is_null($plaintext_key)) {
            $plaintext_key = Cryptography::ALPHABET_UPPER.Cryptography::SPACE;
        }
        $this
            ->_setPlaintextKey($plaintext_key)
            ->setFlag($flag)
        ;
    }

    protected function _reset()
    {
        parent::_reset();
        $this->_setCipherKey(
            strrev($this->plaintext_key)
        );
        return $this;
    }

}

// Endfile