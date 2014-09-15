<?php
/**
 * PHP cryptography
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/cryptography>
 */

namespace Cryptography\SubstitutionTable;

use \Cryptography\Helper;
use \Cryptography\SubstitutionCipher\Simple as SimpleCipher;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class TabulaRecta
{

    /**
     * @var string The original string used
     */
    protected $plaintext_key        = null;

    /**
     * @var array The substitutions table
     */
    protected $substitution_table   = array();

    /**
     * @param $plaintext_key
     */
    public function __construct($plaintext_key)
    {
        $this->setPlaintextKey($plaintext_key);
    }

    /**
     * Define the plain text key and construct the substitutions table
     *
     * @param $str
     */
    public function setPlaintextKey($str)
    {
        $this->plaintext_key = $str;
    }

    /**
     * Get the full substitution table
     */
    public function getSubstitutionTable()
    {
        $str                        = $this->plaintext_key;
        $this->substitution_table   = array();
        for ($i=0; $i<strlen($str); $i++) {
            if ($i>0) {
                $str = Helper::rotate($str, 1);
            }
            $this->substitution_table[$this->plaintext_key{$i}] = str_split($str);
        }
        return $this->substitution_table;
    }

    /**
     * Get a substitution table entry
     *
     * @param int $pos
     * @return string
     */
    public function getSubstitutionTableEntry($pos)
    {
        $str = $this->plaintext_key;
        if ($pos != 0) {
            $str = Helper::rotate($str, $pos);
        }
        return $str;
    }

    /**
     * Debugging
     *
     * @return string
     */
    public function substitutionTableToString()
    {
        return Helper::tableToString(
            $this->getSubstitutionTable(), array(), array(), '"Tabula Recta" Table'
        );
    }

    public function find($a, $b)
    {
        $pos    = strpos($this->plaintext_key, $a);
        $key    = $this->getSubstitutionTableEntry($pos);
        $table  = new SimpleCipher($this->plaintext_key, $key);
        return $table->crypt($b);
    }

    public function retrieve($a, $b)
    {
        $pos    = strpos($this->plaintext_key, $b);
        $key    = $this->getSubstitutionTableEntry($pos);
        $table  = new SimpleCipher($this->plaintext_key, $key);
        return $table->decrypt($a);
    }

}

// Endfile