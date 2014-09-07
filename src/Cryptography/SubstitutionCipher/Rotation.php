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
 * Rotation substitution: "Caesar cipher"
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Rotation
    extends SimpleSubstitution
{

    protected $rotation_value = 0;

    public function __construct($plaintext_key, $rotation_value, $flag = Cryptography::PROCESS_ALL)
    {
        $this
            ->_setPlaintextKey($plaintext_key)
            ->_setRotationValue($rotation_value)
            ->setFlag($flag)
        ;
    }

    protected function _setRotationValue($int)
    {
        $this->rotation_value = $int;
        return $this->_reset();
    }

    protected function _reset()
    {
        parent::_reset();
        $this->_setCipherKey(
            Cryptography::rotate($this->plaintext_key, ($this->rotation_value - 1))
        );
        return $this;
    }

    public static function rot13($str)
    {
        $_this = new self(Cryptography::getAllCharacters(),13);
        return $_this->crypt($str);
    }

}

// Endfile