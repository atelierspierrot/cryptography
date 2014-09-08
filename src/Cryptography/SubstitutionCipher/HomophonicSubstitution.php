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
use \Cryptography\SubstitutionTable\SimpleSubstitutionTable;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class HomophonicSubstitution
    extends SimpleSubstitution
{

    /**
     * @var int Maximum of keys values
     */
    protected $max = 0;

    /**
     * @var int Minimum of keys values
     */
    protected $min = 0;

    /**
     * The keys here must be defined as an array like:
     *
     *      array(
     *          A => array( 1 , 17 , 87 ...)
     *      )
     *
     * @param array $keys_table
     * @param int $flag
     */
    public function __construct(array $keys_table, $flag = Cryptography::PROCESS_ALL)
    {
        $this
            ->setSubstitutionTable(
                new SimpleSubstitutionTable(
                    array_keys($keys_table),
                    $this->_buildCipherKey(array_values($keys_table))
                )
            )
            ->setFlag($flag)
        ;
    }

    /**
     * Build the cipher key from the constructor `$keys_table`
     *
     * @param $table
     * @return mixed
     * @throws \InvalidArgumentException if the substitution keys seems malformed
     */
    protected function _buildCipherKey($table)
    {
        if (!is_array($table)) {
            throw new \InvalidArgumentException(
                sprintf('Cipher key for Homophonic substitution must be an array (got "%s")!', gettype($table))
            );
        }
        $values = array();
        foreach ($table as $items) {
            if (empty($items)) {
                throw new \InvalidArgumentException(
                    'Correspondence list for Homophonic substitution must not be empty!'
                );
            }
            foreach ($items as $item) {
                if (in_array($item, $values)) {
                    throw new \InvalidArgumentException(
                        sprintf('Duplication of correspondence is not allowed for Homophonic substitution (found duplicated "%s")', $item)
                    );
                }
                if ($item < $this->min) {
                    $this->min = $item;
                }
                if ($item > $this->max) {
                    $this->max = $item;
                }
                $values[] = $item;
            }
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
        foreach ($ciphers as $i=>$list) {
            $ciphers[$i] = implode('-', $list);
        }
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
                $r[] = $table[$l][array_rand($table[$l])];
            }
        }
        return implode('', $r);
    }

    /**
     * Decrypt a string
     *
     * @param $str
     * @return mixed|string
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
                foreach ($table as $index=>$items) {
                    if (in_array($l, $items)) {
                        $r[] = $index;
                    }
                }
            }
        }
        return implode('', $r);
    }

}

// Endfile