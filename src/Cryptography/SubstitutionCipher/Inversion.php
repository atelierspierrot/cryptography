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
use \Cryptography\SubstitutionTable\Simple as SimpleSubstitutionTable;

/**
 * Inversion substitution: "Atbash cipher"
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Inversion
    extends Simple
{

    /**
     * @param null $plaintext_key
     * @param array|int $flag
     */
    public function __construct($plaintext_key = null, $flag = Cryptography::PROCESS_ALL)
    {
        if (is_null($plaintext_key)) {
            $plaintext_key = Cryptography::ALPHABET_UPPER.Cryptography::SPACE;
        }
        $this
            ->setSubstitutionTable(
                new SimpleSubstitutionTable($plaintext_key)
            )
            ->setFlag($flag)
        ;
    }

    /**
     * Reset the substitution table to original form
     *
     * @return $this
     */
    protected function _reset()
    {
        parent::_reset();
        $this->substitution_table->setSubstitutions(
            array(str_split(strrev($this->substitution_table->getPlaintextKey())))
        );
        return $this;
    }

}

// Endfile