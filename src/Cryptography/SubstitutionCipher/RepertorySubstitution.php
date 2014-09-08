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

/**
 * The keys here must be defined as an array like:
 *
 *      array(
 *          word    =>  X
 *          syllab  =>  Y
 *          A (letter) => Z
 *      )
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class RepertorySubstitution
    extends HomophonicSubstitution
{

    /**
     * Preparing the ciphers
     *
     * @param $table
     * @return mixed
     * @throws \InvalidArgumentException
     */
    protected function _buildCipherKey($table)
    {
        if (!is_array($table)) {
            throw new \InvalidArgumentException(
                sprintf('Cipher keys for Repertory substitution must be an array (got "%s"!', gettype($table))
            );
        }
        $values = array();
        foreach ($table as $item) {
            if (empty($item)) {
                throw new \InvalidArgumentException(
                    'Correspondence list for Repertory substitution must not be empty!'
                );
            }
            if (in_array($item, $values)) {
                throw new \InvalidArgumentException(
                    sprintf('Duplication of correspondence is not allowed for Repertory substitution (found duplicated "%s")', $item)
                );
            }
            $values[] = $item;
        }
        return $table;
    }

    /**
     * Debugging the substitution table
     *
     * @return string
     */
    public function substitutionTableToString()
    {
        $ciphers = $this->substitution_table->getSubstitutions();
        $ciphers = $ciphers[0];
        return Helper::tableToString(
            $ciphers, $this->substitution_table->getPlaintextKey(), array(), __CLASS__.' Encryption Table'
        );
    }

    /**
     * Crypt a string
     *
     * @param $str
     * @return mixed|string
     */
    public function crypt($str)
    {
        $str    = $this->_prepare($str);
        $table  = $this->substitution_table->getSubstitutionTable();
        $s      = str_split($str);
        $r      = array();
        foreach ($s as $l) {
            if ($l==Cryptography::SPACE && ($this->flag & Cryptography::KEEP_SPACES)) {
                $r[] = Cryptography::SPACE;
            } else {
                $r[] = $table[$l];
            }
        }
        return implode('', $r);
    }

    /**
     * Decrypt a string
     *
     * @param $str
     * @return string
     *
     * @TODO
     */
    public function decrypt($str)
    {
        $str    = $this->_prepare($str);
        $table  = $this->substitution_table->getSubstitutionTable();
        $s      = str_split($str, strlen($this->min));
        $r      = array();
        foreach ($s as $l) {
            if ($l==Cryptography::SPACE && ($this->flag & Cryptography::KEEP_SPACES)) {
                $r[] = Cryptography::SPACE;
            } else {
                $r[] = array_search($l, $table);
            }
        }
        return implode('', $r);
    }


}

// Endfile