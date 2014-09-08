<?php
/**
 * PHP cryptography
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/cryptography>
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

}

// Endfile