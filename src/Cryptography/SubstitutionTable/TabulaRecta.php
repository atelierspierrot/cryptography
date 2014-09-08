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
        $r = array();
        for ($i=0; $i<strlen($str); $i++) {
            if ($i>0) {
                $str = Helper::rotate($str, 1);
            }
            $r[] = str_split($str);
        }
        $this->substitution_table = $r;
    }

    /**
     * Debugging
     *
     * @return string
     */
    public function substitutionTableToString()
    {
        return Helper::tableToString(
            $this->substitution_table, array(), array(), '"Tabula Recta" Table'
        );
    }

}

// Endfile