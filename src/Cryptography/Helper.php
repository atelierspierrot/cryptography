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

namespace Cryptography;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class Helper
{

    /**
     * Table to string renderer
     *
     * @param array $body
     * @param array $headers_line
     * @param array $headers_column
     * @param string $title
     * @return string
     */
    public static function tableToString(
        array $body, array $headers_line = array(), array $headers_column = array(),
        $title = ''
    ) {
        $table = new \Library\Tool\Table(
            $body, $headers_line
        );
        if (!empty($headers_column)) {
            $table->addHeaderColumn($headers_column, 1);
        }
        $table::$default_foot_mask = !empty($title) ? $title : 'Encryption Table';
        return $table->__toString();
    }

    /**
     * Randomize an input string
     *
     * @param $input string
     * @return string
     */
    public static function randomize($input)
    {
        $p = str_split((string) $input);
        shuffle($p);
        return implode('', $p);
    }

    /**
     * Rotate an input string
     *
     * @param $input
     * @param int $rotation
     * @return string
     */
    public static function rotate($input, $rotation = 1)
    {
        $p = str_split((string) $input);
        for ($i=0; $i<abs($rotation); $i++) {
            if ($rotation > 0) {
                array_push($p, array_shift($p));
            } else {
                array_unshift($p, array_pop($p));
            }
        }
        return implode('', $p);
    }

    /**
     * Case tester
     *
     * @param $list
     * @param string $type
     * @return bool
     */
    public static function testCase($list, $type = 'upper')
    {
        if (is_array($list)) {
            $return = true;
            foreach ($list as $i=>$v) {
                $return = self::testCase($v, $type);
            }
        } else {
            if ($type=='upper') {
                $return = (strtoupper($list) == $list);
            } elseif ($type=='lower') {
                $return = (strtolower($list) == $list);
            } else {
                $return = false;
            }
        }
        return $return;
    }

    public static function homogenizeString($str, $condition)
    {
        if (is_array($str)) {
            foreach ($str as $i=>$v) {
                $str[$i] = self::homogenizeString($v, $condition);
            }
        } else {
            // upper case?
            if (Helper::testCase($condition, 'upper')) {
                $str = strtoupper($str);

            // lower case?
            } elseif (Helper::testCase($condition, 'lower')) {
                $str = strtolower($str);
            }
        }

        return $str;
    }

    /**
     * This will clean a string keeping only the characters in `$allowed`
     *
     * @param string $str
     * @param string $allowed
     * @return string
     */
    public static function sanitizeString($str, $allowed = Cryptography::ALPHABET_UPPER_REGEX)
    {
        return preg_replace('/[^'.$allowed.' ]/', '', $str);
    }

    /**
     * Strip spaces in a string
     *
     * @param string $str
     * @param string $replace
     * @return string
     */
    public static function stripSpaces($str, $replace = '')
    {
        return preg_replace('/\s+/ix', $replace, $str);
    }

}

// Endfile