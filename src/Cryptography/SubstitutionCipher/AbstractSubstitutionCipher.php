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
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
abstract class AbstractSubstitutionCipher
{

    protected $plaintext_key    = null;

    protected $cipher_key       = null;

    protected $action;

    protected $flag             = Cryptography::PROCESS_ALL;

    public function setFlag($flag)
    {
        $this->flag = $flag;
        return $this->_reset();
    }

    public function process()
    {
        if ($this->action & Cryptography::DECRYPT) {
            return $this->decrypt();
        } elseif ($this->action & Cryptography::CRYPT) {
            return $this->crypt();
        }
    }

    protected function _setPlaintextKey($str)
    {
        $this->plaintext_key = $str;
        return $this;
    }

    protected function _setCipherKey($str)
    {
        $this->cipher_key = $str;
        return $this;
    }

    protected function _reset()
    {
        if ($this->flag & Cryptography::KEEP_SPACES) {
            $this->_setPlaintextKey(
                str_replace(Cryptography::SPACE, '', $this->plaintext_key)
            );
            $this->_setCipherKey(
                str_replace(Cryptography::SPACE, '', $this->cipher_key)
            );
        }
        return $this;
    }

    protected function _prepare($str)
    {
        // upper case?
        if (strtoupper($this->plaintext_key) == $this->plaintext_key) {
            return strtoupper($str);
        // lower case?
        } elseif (strtolower($this->plaintext_key) == $this->plaintext_key) {
            return strtolower($str);
        } else {
            return $str;
        }
    }

    abstract function crypt($str);

    abstract function decrypt($str);

}

// Endfile