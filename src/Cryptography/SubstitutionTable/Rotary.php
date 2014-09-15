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
use \Cryptography\Helper;
use \Cryptography\SubstitutionTable\Simple as SimpleSubstitutionTable;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Rotary
    extends SimpleSubstitutionTable
{

    /**
     * @var int The rotation value
     */
    protected $rotation     = 1;

    /**
     * @param string $plaintext_key
     * @param int $rotation
     */
    public function __construct($plaintext_key = '', $rotation = 1)
    {
        parent::__construct($plaintext_key, array(str_split($plaintext_key)));
        $this->setRotation($rotation);
    }

    /**
     * Define the rotation value
     *
     * @param $rotation
     * @return $this
     */
    public function setRotation($rotation)
    {
        $this->rotation = $rotation;
        return $this;
    }

    /**
     * Make a run of rotation
     *
     * @param null $rotation
     * @return $this
     */
    public function rotate($rotation = null)
    {
        if (is_null($rotation)) {
            $rotation = $this->rotation;
        }
        $cipher = $this->getSubstitutions();
        $this->setSubstitutions(
            array(Helper::rotate($cipher[0], $rotation))
        );
        return $this;
    }

}

// Endfile