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
use \Cryptography\Tools\StringCracker;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class CryptedCracker
{

    protected $crypted;

    public function __construct($crypted)
    {
        $this
            ->setCryptedString($crypted)
            ;
    }

    public function setCryptedString($str)
    {
        $this->crypted = $str;
        return $this;
    }

    public function processAllHashes()
    {
        $cracker = new StringCracker();
        foreach (hash_algos() as $hash) {
            if (($c = $cracker->crack($this->crypted, $hash))!==null) {
                return $c;
            }
        }
        return null;
    }
}

// Endfile