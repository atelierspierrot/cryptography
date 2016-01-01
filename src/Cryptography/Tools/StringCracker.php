<?php
/**
 * This file is part of the Cryptography package.
 *
 * Copyright (c) 2014-2016 Pierre Cassat <me@e-piwi.fr> and contributors
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * The source code of this package is available online at 
 * <http://github.com/atelierspierrot/cryptography>.
 */

namespace Cryptography\Tools;

use \Cryptography\Cryptography;
use \Cryptography\Helper;
use \Maths\Arithmetic\Helper as MathsHelper;

/**
 * @author  piwi <me@e-piwi.fr>
 */
class StringCracker
    extends StringBuilder
{

    protected $closure;
    protected $min_length   = 1;
    protected $max_length   = 100;

    public function __construct(
        $closure = 'md5',
        $characters = null,
        $flag = Cryptography::TYPE_COMBINATION
    ) {
        if (is_null($characters)) {
            $characters = Cryptography::getAllCharacters();
        }
        parent::__construct($characters, $flag);
        $this->setClosure($closure);
    }

    public function setClosure($fct)
    {
        switch ($fct) {
            case 'md5':
                $this->closure = function ($str, $orig) { return md5($str)==$orig; };
                break;
            case 'sha1':
                $this->closure = function ($str, $orig) { return sha1($str)==$orig; };
                break;
            case 'sha256':
                $this->closure = function ($str, $orig) { return hash('sha256', $str)==$orig; };
                break;
            case 'crc32':
                $this->closure = function ($str, $orig) { return hash('crc32', $str)==$orig; };
                break;
            default:
                if (is_callable($fct)) {
                    $this->closure = $fct;
                } else {
                    if (is_string($fct)) {
                        $algos = hash_algos();
                        if (in_array($fct, $algos)) {
                            $this->closure = function ($str, $orig) use ($fct) { return hash($fct, $str)==$orig; };
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

    public function crack($str, $closure = null, $min_length = 1, $max_length = null)
    {
        if (!empty($closure)) {
            $this->setClosure($closure);
        }
        if (!empty($min_length)) {
            $this->setMinLength($min_length);
        }
        if (!empty($max_length)) {
            $this->setMaxLength($max_length);
        } elseif (is_null($max_length)) {
            $this->setMaxLength(count($this->plaintext_keys));
        }

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
