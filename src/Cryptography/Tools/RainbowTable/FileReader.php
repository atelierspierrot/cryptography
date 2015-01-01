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

namespace Cryptography\Tools;

use \Cryptography\Cryptography;
use \Cryptography\Helper;
use \Maths\Arithmetic\Helper as MathsHelper;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class RainbowTableGenerator
{

    protected $closure;
    protected $min_length   = 1;
    protected $max_length   = 100;

    public function __construct(
        $closure = 'md5', $min_length = 1, $max_length = null
    ) {
        $this->setClosure($closure);
        if (!empty($min_length)) {
            $this->setMinLength($min_length);
        }
        if (!empty($max_length)) {
            $this->setMaxLength($max_length);
        }
    }

    public function setClosure($fct)
    {
        switch ($fct) {
            case 'md5':
                $this->closure = function($str,$orig) { return md5($str)==$orig; };
                break;
            case 'sha1':
                $this->closure = function($str,$orig) { return sha1($str)==$orig; };
                break;
            case 'sha256':
                $this->closure = function($str,$orig) { return hash('sha256', $str)==$orig; };
                break;
            case 'crc32':
                $this->closure = function($str,$orig) { return hash('crc32', $str)==$orig; };
                break;
            default:
                if (is_callable($fct)) {
                    $this->closure = $fct;
                } else {
                    if (is_string($fct)) {
                        $algos = hash_algos();
                        if (in_array($fct, $algos)) {
                            $this->closure = function($str,$orig) use ($fct) { return hash($fct, $str)==$orig; };
                        } else {
                            throw new \InvalidArgumentException(
                                sprintf('Hash algorithm "%s" not found!', $fct)
                            );
                        }
                    } else {
                        throw new \InvalidArgumentException(
                            sprintf('Closure to crack must be callable (get type "%s")!', gettype($fct))
                        );
                    }
                }
                break;
        }
        return $this;
    }

    public function setMinLength($min_length)
    {
        $this->min_length = $min_length;
        return $this;
    }

    public function setMaxLength($max_length)
    {
        $this->max_length = $max_length;
        return $this;
    }

    public function generate($characters = array())
    {

        return $this->doProcess($str, $this->closure);
    }

    public function doProcess($str, \Closure $closure = null)
    {
        $count  = count($this->plaintext_keys);
        if ($this->flag & Cryptography::TYPE_COMBINATION) {
            $max    = pow($count, $count);
        } else {
            $max    = MathsHelper::factorial($count);
        }
        for ($i=0; $i<$max; $i++) {
            try {
                if (!is_callable($closure)) {
                    throw new \Exception(
                        sprintf('"closure" argument "%s" is not callable!', is_array($closure) ? implode(' ', $closure) : $closure)
                    );
                }
                $value = $this->doProcessCombination($i);
                $hash = call_user_func($closure, $value, $str);
                if ($hash) {
                    return $value;
                }
            } catch (\Exception $e) {
                throw $e;
            }
        }
        return null;
    }

}

// Endfile