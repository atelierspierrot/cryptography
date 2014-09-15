<?php
/**
 * PHP cryptography
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/cryptography>
 */

namespace Cryptography\SubstitutionTable;

use \Cryptography\Cryptography;
use \Cryptography\SubstitutionTable\Simple as SimpleSubstitutionTable;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Keyword
    extends SimpleSubstitutionTable
{

    /**
     * @param string $plaintext_key
     * @param string $user_key
     */
    public function __construct(
        $plaintext_key = '', $user_key = ''
    ) {
        $user_keys = str_split($user_key);
        parent::__construct($plaintext_key, $user_keys);
    }

    /**
     * @param int $action
     * @return array|mixed
     */
    public function getSubstitutionTable($action = Cryptography::CRYPT)
    {
        $table      = array();
        $keys       = $this->getSubstitutions();
        $key_length = count($keys);
        $parts      = str_split($this->getPlaintextKey());
        foreach ($parts as $i=>$part) {
            $pos = (($i + 1) % $key_length);
            $table[$part] = $keys[$pos];
        }
        return $table;
    }

}

// Endfile