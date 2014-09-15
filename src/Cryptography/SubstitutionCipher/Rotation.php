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
use \Cryptography\SubstitutionTable\Simple as SimpleSubstitutionTable;

/**
 * Rotation substitution: "Caesar cipher"
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Rotation
    extends Simple
{

    /**
     * @var int The rotation indice
     */
    protected $rotation_value = 0;

    /**
     * @param string $plaintext_key
     * @param array $rotation_value
     * @param int $flag
     */
    public function __construct($plaintext_key, $rotation_value, $flag = Cryptography::PROCESS_ALL)
    {
        $this
            ->setSubstitutionTable(
                new SimpleSubstitutionTable($plaintext_key)
            )
            ->_setRotationValue($rotation_value)
            ->setFlag($flag)
        ;
    }

    /**
     * Define the rotation indice
     *
     * @param $int
     * @return $this
     */
    protected function _setRotationValue($int)
    {
        $this->rotation_value = $int;
        return $this->_reset();
    }

    /**
     * Reset the substitution table to its original form
     *
     * @return $this
     */
    protected function _reset()
    {
        parent::_reset();
        $this->substitution_table->setSubstitutions(
            array(str_split(Helper::rotate(
                $this->substitution_table->getPlaintextKey(), ($this->rotation_value - 1)
            )))
        );
        return $this;
    }

    /**
     * Shortcut or `ROT13`
     *
     * @param $str
     * @return mixed|string
     */
    public static function rot13($str)
    {
        $_this = new self(Cryptography::getAllCharacters(),13);
        return $_this->crypt($str);
    }

}

// Endfile