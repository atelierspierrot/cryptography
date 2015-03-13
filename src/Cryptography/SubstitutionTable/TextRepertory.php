<?php
/**
 * This file is part of the Cryptography package.
 *
 * Copyright (c) 2014-2015 Pierre Cassat <me@e-piwi.fr> and contributors
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

namespace Cryptography\SubstitutionTable;

use \Cryptography\Cryptography;
use \Cryptography\Helper;
use \Cryptography\SubstitutionTable\Simple as SimpleSubstitutionTable;
use \Cryptography\Analysis\Position as PositionAnalyzer;

/**
 * @author  piwi <me@e-piwi.fr>
 */
class TextRepertory
    extends SimpleSubstitutionTable
{

    protected $occurrence_flag;

    protected $character_flag;

    protected $scope_flag;

    protected $text_analyzer;

    /**
     * @param string $plaintext_key
     * @param int $scope_flag
     * @param int $occurrence_flag
     * @param int $character_flag
     */
    public function __construct(
        $plaintext_key = '',
        $scope_flag = Cryptography::SCOPE_WORD,
        $occurrence_flag = Cryptography::FIRST_OCCURRENCE,
        $character_flag = Cryptography::ALPHABET_UPPER
    ) {
        parent::__construct($plaintext_key, array());
        $this
            ->setOccurrenceFlag($occurrence_flag)
            ->setCharacterFlag($character_flag)
            ->setScopeFlag($scope_flag)
            ;
    }

    public function buildTextAnalyzer(
        $scope_flag = Cryptography::SCOPE_WORD,
        $character_flag = Cryptography::ALPHABET_UPPER
    ) {
        $this->setTextAnalyzer(
            new PositionAnalyzer(
                $scope_flag, $character_flag
            )
        );
        return $this;
    }

    protected function _buildSubstitutionTable()
    {
        if (empty($this->text_analyzer->analysis)) {
            $this->text_analyzer->process($this->getPlaintextKey());
        }

        $table  = array();
        foreach ($this->text_analyzer->analysis as $word=>$occurrences) {
            if ($this->occurrence_flag & Cryptography::ALL_OCCURRENCES) {
                $table[$word] = $occurrences[array_rand($occurrences)];
            } elseif ($this->occurrence_flag & Cryptography::LAST_OCCURRENCE) {
                $table[$word] = array_pop($occurrences);
            } elseif ($this->occurrence_flag & Cryptography::FIRST_OCCURRENCE) {
                $table[$word] = array_shift($occurrences);
            }
        }
        $this->setSubstitutions($table);
        return $this;
    }

    /**
     * Prepare the string
     *
     * @param $str
     * @return array|string
     */
    protected function _prepare($str)
    {
        return Helper::homogenizeString($str, $this->character_flag);
    }

    /**
     * Define the plain text key
     *
     * @param $str
     * @return $this
     */
    public function setPlaintextKey($str)
    {
        $this->plaintext_key = $this->_prepare($str);
        return $this;
    }

    public function setTextAnalyzer(PositionAnalyzer $analyzer)
    {
        $this->text_analyzer = $analyzer;
        $this->_buildSubstitutionTable();
        return $this;
    }

    public function setOccurrenceFlag($flag)
    {
        $this->occurrence_flag = $flag;
        return $this;
    }

    public function getOccurrenceFlag()
    {
        return $this->occurrence_flag;
    }

    public function setScopeFlag($flag)
    {
        $this->scope_flag = $flag;
        $this->buildTextAnalyzer($this->scope_flag, $this->character_flag);
        return $this;
    }

    public function getScopeFlag()
    {
        return $this->scope_flag;
    }

    public function setCharacterFlag($flag)
    {
        $this->character_flag = $flag;
        $this->buildTextAnalyzer($this->scope_flag, $this->character_flag);
        return $this;
    }

    public function getCharacterFlag()
    {
        return $this->character_flag;
    }

    /**
     * @return array|mixed|string
     */
    public function getPlaintextKey()
    {
        return $this->plaintext_key;
    }

    /**
     * @return array|mixed
     */
    public function getSubstitutions()
    {
        return $this->substitutions;
    }

    /**
     * @param int $action
     * @return array|mixed
     */
    public function getSubstitutionTable($action = Cryptography::CRYPT)
    {
        return $this->getSubstitutions();
    }

}

// Endfile