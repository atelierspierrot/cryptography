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
use \Cryptography\SubstitutionTable\AbstractSubstitutionTable;
use \Cryptography\Helper;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
abstract class AbstractSubstitutionCipher
{

    /**
     * @var AbstractSubstitutionTable The substitution table object used to crypt/decrypt
     */
    protected $substitution_table;

    /**
     * @var int The action "to do" : `Cryptography::CRYPT` or `Cryptography::DECRYPT`
     */
    protected $action;

    /**
     * @var int Behavior of the encryptor: `Cryptography::PROCESS_ALL` or `Cryptography::KEEP_SPACES`
     */
    protected $flag = Cryptography::PROCESS_ALL;

    /**
     * Define the cipher substitution table object
     *
     * @param AbstractSubstitutionTable $object
     * @return $this
     */
    public function setSubstitutionTable(AbstractSubstitutionTable $object)
    {
        $this->substitution_table = $object;
        return $this->_reset();
    }

    /**
     * Retrieve the cipher substitution object
     *
     * @return AbstractSubstitutionTable
     */
    public function getSubstitutionTable()
    {
        return $this->substitution_table;
    }

    /**
     * Define the behavior flag of the object
     *
     * @param $flag
     * @return $this
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;
        return $this->_reset();
    }

    /**
     * Generic method to dispatch the "to do" action
     *
     * @return mixed
     */
    public function process()
    {
        if ($this->action & Cryptography::DECRYPT) {
            return $this->decrypt();
        } elseif ($this->action & Cryptography::CRYPT) {
            return $this->crypt();
        }
    }

    /**
     * Reset the substitution tables when updating a key
     *
     * @return $this
     */
    protected function _reset()
    {
        if ($this->flag & Cryptography::KEEP_SPACES) {
            $this->substitution_table->setPlaintextKey(
                str_replace(Cryptography::SPACE, '', $this->substitution_table->getPlaintextKey())
            );

            $subs = $this->substitution_table->getSubstitutions();
            foreach ($subs as $i=>$sub) {
                if (is_string($sub)) {
                    $subs[$i] = str_replace(Cryptography::SPACE, '', $sub);
                } else {
                    if (in_array(Cryptography::SPACE, $sub)) {
                        $sub[array_search(Cryptography::SPACE, $sub)] = null;
                        $subs[$i] = $sub;
                    }
                }
            }
            $this->substitution_table->setSubstitutions($subs);
        }
        return $this;
    }

    /**
     * Prepare the string to crypt/decrypt: this will return the string according to keys case
     *
     * @param $str
     * @return array|string
     */
    protected function _prepare($str)
    {
        if (is_array($str)) {
            foreach ($str as $i=>$v) {
                $str[$i] = self::_prepare($v);
            }
        } else {
            // upper case?
            if (Helper::testCase($this->substitution_table->getPlaintextKey(), 'upper')) {
                return strtoupper($str);
                // lower case?
            } elseif (Helper::testCase($this->substitution_table->getPlaintextKey(), 'lower')) {
                return strtolower($str);
            } else {
                return $str;
            }
        }
    }

    /**
     * Crypt a string
     *
     * @param $str
     * @return mixed
     */
    abstract function crypt($str);

    /**
     * Decrypt a string
     *
     * @param $str
     * @return mixed
     */
    abstract function decrypt($str);

}

// Endfile