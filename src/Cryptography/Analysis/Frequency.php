<?php
/**
 * This file is part of the Cryptography package.
 *
 * Copyleft (ↄ) 2014-2015 Pierre Cassat <me@e-piwi.fr> and contributors
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * The source code of this package is available online at 
 * <http://github.com/atelierspierrot/cryptography>.
 */

namespace Cryptography\Analysis;

use \Cryptography\Cryptography;
use \Cryptography\Helper;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Frequency
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
                    $this->analysis[chr($i)] = $v;
                }
                break;
            case Cryptography::SCOPE_WORD:
                $parts = explode(' ', $str);
                foreach ($parts as $part) {
                    if (!array_key_exists($part, $this->analysis)) {
                        $this->analysis[$part] = substr_count($str, $part);
                    }
                }
                break;
            case Cryptography::SCOPE_RANDOM:
                break;
        }

        uasort($this->analysis, function($a,$b) { return ($a>$b ? -1 : ($a==$b ? 0 : 1)); });
        return $this;
    }

}

// Endfile