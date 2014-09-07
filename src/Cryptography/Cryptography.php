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
class Cryptography
{

    const CRYPT             = 1;

    const DECRYPT           = 2;

    const PROCESS_ALL       = 0;

    const KEEP_SPACES       = 1;

    const SPACE             = ' ';

    const NUMBERS           = '0123456789';

    const ALPHABET_UPPER    = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    const ALPHABET_LOWER    = 'abcdefghijklmnopqrstuvwxyz';

    const SPECIAL_CHARACTERS= '.,;:?!+-=_%&§#*$`"\'()[]{}<>@';

    public static function getAllCharacters()
    {
        return
             Cryptography::ALPHABET_UPPER
            .Cryptography::ALPHABET_LOWER
            .Cryptography::NUMBERS
            .Cryptography::SPACE
            .Cryptography::SPECIAL_CHARACTERS;
    }

    public static function tableToString(
        array $plaintext, array $cipher,
        $with_indices = true, $separator = ' | ', $eol = "\n"
    ) {
        $lines          = array();
        $plaintext_c    = count($plaintext);
        $cipher_c       = count($cipher);
        $max            = max($plaintext_c, $cipher_c);
        if ($with_indices) {
            $plaintext_i    = 1;
            $cipher_i       = 2;
        } else {
            $plaintext_i    = 0;
            $cipher_i       = 1;
        }
        for ($i=0; $i<$max; $i++) {
            if ($with_indices) {
                $lines[0][] = $i+1;
            }
            $lines[$plaintext_i][]  = isset($plaintext[$i]) ? $plaintext[$i] : '';
            $lines[$cipher_i][]     = isset($cipher[$i]) ? $cipher[$i] : '';
        }
        if ($with_indices) {
            array_unshift($lines[0], '');
            array_unshift($lines[$plaintext_i], 'plain text key');
            array_unshift($lines[$cipher_i], 'cipher key');
        }
        for ($i=0; $i<=$max; $i++) {
            if ($with_indices) {
                $length = max(
                    strlen($lines[0][$i]),
                    strlen($lines[1][$i]),
                    strlen($lines[2][$i])
                );
                $lines[0][$i] = str_pad($lines[0][$i], $length, ' ');
                $lines[1][$i] = str_pad($lines[1][$i], $length, ' ');
                $lines[2][$i] = str_pad($lines[2][$i], $length, ' ');
            } else {
                $length = max(
                    strlen($lines[0][$i]),
                    strlen($lines[1][$i])
                );
                $lines[0][$i] = str_pad($lines[0][$i], $length, ' ');
                $lines[1][$i] = str_pad($lines[1][$i], $length, ' ');
            }
        }
        $str = '';
        foreach ($lines as $line) {
            $str .= $separator.implode($separator, $line).$separator.$eol;
        }
        return $str;
    }

    public static function randomize($input)
    {
        $p = str_split((string) $input);
        shuffle($p);
        return implode('', $p);
    }

    public static function rotate($input, $rotation = 1)
    {
        $p = str_split((string) $input);
        for ($i=0; $i<$rotation; $i++) {
            array_push($p, array_shift($p));
        }
        return implode('', $p);
    }

}

// Endfile