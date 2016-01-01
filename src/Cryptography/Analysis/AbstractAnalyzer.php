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

namespace Cryptography\Analysis;

use \Cryptography\Cryptography;
use \Cryptography\Helper;

/**
 * @author  piwi <me@e-piwi.fr>
 */
abstract class AbstractAnalyzer
{

    /**
     * @var int Analysis scope: letter, word ...
     */
    protected $analysis_type;

    /**
     * @var string List of allowed characters
     */
    protected $allowed_characters;

    /**
     * @var string List of allowed characters for regular expressions
     */
    protected $allowed_characters_regex;

    /**
     * @var array
     */
    public $analysis;

    /**
     * @param int $analysis_type
     * @param string $allowed_characters
     */
    public function __construct(
        $analysis_type = Cryptography::SCOPE_WORD,
        $allowed_characters = Cryptography::ALPHABET_UPPER
    ) {
        $this
            ->setAnalysisType($analysis_type)
            ->setAllowedCharacters($allowed_characters)
            ;
    }

    public function setAnalysisType($analysis_type)
    {
        $this->analysis_type = $analysis_type;
        return $this;
    }

    public function setAllowedCharacters($allowed_characters)
    {
        $this->allowed_characters = $allowed_characters;
        if (substr_count($this->allowed_characters, Cryptography::ALPHABET_UPPER)) {
            $this->allowed_characters_regex .= Cryptography::ALPHABET_UPPER_REGEX;
        }
        if (substr_count($this->allowed_characters, Cryptography::ALPHABET_LOWER)) {
            $this->allowed_characters_regex .= Cryptography::ALPHABET_LOWER_REGEX;
        }
        if (substr_count($this->allowed_characters, Cryptography::NUMBERS)) {
            $this->allowed_characters_regex .= Cryptography::NUMBERS_REGEX;
        }
        if (substr_count($this->allowed_characters, Cryptography::SPECIAL_CHARACTERS)) {
            $this->allowed_characters_regex .= Cryptography::SPECIAL_CHARACTERS_REGEX;
        }
        return $this;
    }

    public function prepareString($str)
    {
        switch ($this->allowed_characters) {
            case Cryptography::ALPHABET_UPPER:
                $str = strtoupper($str);
                break;
            case Cryptography::ALPHABET_LOWER:
                $str = strtolower($str);
                break;
        }
        $str = Helper::sanitizeString($str, $this->allowed_characters_regex);
        return $str;
    }

    abstract public function process($str);
}
