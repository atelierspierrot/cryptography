<?php
/**
 * PHP cryptography
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/cryptography>
 */

namespace Cryptography\SubstitutionCipher;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
abstract class AbstractSubstitutionCipherPreset
{

    /**
     * @var \Cryptography\SubstitutionCipher\AbstractSubstitutionCipher
     */
    protected $substitution;

    /**
     * Crypt a string with the preset
     *
     * @param $str
     * @return mixed
     */
    public function crypt($str)
    {
        return $this->substitution->crypt($str);
    }

    /**
     * Decrypt a string with the preset
     *
     * @param $str
     * @return mixed
     */
    public function decrypt($str)
    {
        return $this->substitution->decrypt($str);
    }

}

// Endfile