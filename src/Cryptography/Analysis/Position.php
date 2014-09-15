<?php
/**
 * PHP cryptography
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/cryptography>
 */

namespace Cryptography\Analysis;

use \Cryptography\Cryptography;
use \Cryptography\Helper;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Position
    extends AbstractAnalyzer
{

    public function process($str)
    {
        $str = $this->prepareString($str);

        $this->analysis = array();
        switch ($this->analysis_type) {
            case Cryptography::SCOPE_LETTER:
                $res = count_chars($str, 1);
                foreach ($res as $i=>$v) {
                    $this->analysis[chr($i)][] = $v;
                }
                break;
            case Cryptography::SCOPE_WORD:
                $parts = explode(' ', $str);
                foreach ($parts as $i=>$part) {
                    $this->analysis[$part][] = $i;
                }
                break;
        }

        return $this;
    }

}

// Endfile