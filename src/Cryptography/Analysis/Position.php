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

namespace Cryptography\Analysis;

use \Cryptography\Cryptography;
use \Cryptography\Helper;

/**
 * @author  piwi <me@e-piwi.fr>
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