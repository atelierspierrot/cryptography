<?php
/**
 * This file is part of the Cryptography package.
 *
 * Copyright (c) 2013-2015 Pierre Cassat <me@e-piwi.fr> and contributors
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

namespace Cryptography\Tools\RainbowTable;

use \Cryptography\Cryptography;
use \Cryptography\Helper;
use \Library\Helper\File as FileHelper;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class FileGenerator
{

    protected $rainbow_file;

    protected $closure;
    protected $closure_name;
    protected $characters;
    protected $min_length   = 1;
    protected $max_length   = 100;

    public function __construct(
        $closure = 'md5', $characters = array(),
        $min_length = 1, $max_length = null
    ) {
        $this
            ->setClosure($closure)
            ->setCharacters($characters)
        ;
        if (!empty($min_length)) {
            $this->setMinLength($min_length);
        }
        if (!empty($max_length)) {
            $this->setMaxLength($max_length);
        }
    }

    protected function _init()
    {
        $rd = realpath(__DIR__.'/../../Resources');
        $fn = 'rainbow-'.$this->closure_name.'.csv';
        $this->rainbow_file = $rd.'/'.$fn;
    }

    public function getRainbowFile()
    {
        return $this->rainbow_file;
    }

    public function setClosure($fct)
    {
        switch ($fct) {
            case 'md5':
                $this->closure = function($str) { return md5($str); };
                $this->closure_name = $fct;
                break;
            case 'sha1':
                $this->closure = function($str) { return sha1($str); };
                $this->closure_name = $fct;
                break;
            case 'sha256':
                $this->closure = function($str) { return hash('sha256', $str); };
                $this->closure_name = $fct;
                break;
            case 'crc32':
                $this->closure = function($str) { return hash('crc32', $str); };
                $this->closure_name = $fct;
                break;
            default:
                if (is_callable($fct)) {
                    $this->closure = $fct;
                    $this->closure_name = 'user-fct';
                } else {
                    if (is_string($fct)) {
                        $algos = hash_algos();
                        if (in_array($fct, $algos)) {
                            $this->closure = function($str) use ($fct) { return hash($fct, $str); };
                            $this->closure_name = $fct;
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

    public function setCharacters($characters)
    {
        $this->characters = is_array($characters) ? $characters : str_split($characters);
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

    public function generate()
    {
        $this->_init();
        $logs = array();

        // loop over each characters letter
        for ($j=0; $j<count($this->characters); $j++) {
            $l = $this->characters[$j];

            // loop to create string in length [min;max]
            for ($i=$this->min_length; $i<=$this->max_length; $i++) {
                $str = str_pad($l, $i, $l);
                FileHelper::write(
                    $this->rainbow_file,
                    $this->doProcess($str, $this->closure)."\t".$str."\n",
                    'a+', true, $logs
                );
            }
        }

        return $logs;
    }

    public function doProcess($str, \Closure $closure = null)
    {
        try {
            if (!is_callable($closure)) {
                throw new \Exception(
                    sprintf('"closure" argument "%s" is not callable!', is_array($closure) ? implode(' ', $closure) : $closure)
                );
            }
            return call_user_func($closure, $str);
        } catch (\Exception $e) {
            throw $e;
        }
    }

}

// Endfile