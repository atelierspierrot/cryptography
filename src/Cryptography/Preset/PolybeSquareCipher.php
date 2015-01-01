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

namespace Cryptography\Preset;

use \Cryptography\Cryptography;
use \Cryptography\SubstitutionCipher\Square;
use \Cryptography\SubstitutionCipher\AbstractSubstitutionCipherPreset;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class PolybeSquareCipher
    extends AbstractSubstitutionCipherPreset
{

    public function __construct(
        $plaintext_key = Cryptography::ALPHABET_UPPER
    ) {
        $this->substitution = new Square(
            $plaintext_key,
            Cryptography::KEEP_SPACES
        );
    }

}

// Endfile