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

// Endfile