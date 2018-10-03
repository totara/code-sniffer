<?php
/*
 * This file is part of Totara Learn
 *
 * Copyright (C) 2018 onwards Totara Learning Solutions LTD
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Fabian Derschatta <fabian.derschatta@totaralearning.com>
 */

namespace TotaraCodeSniffer\Standards\Totara\Tests\NamingConventions;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

class ValidVariableNameUnitTest extends AbstractSniffUnitTest
{

    /**
     * Returns the lines where errors should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of errors that should occur on that line.
     *
     * @return array<int, int>
     */
    public function getErrorList()
    {
        return [
            2 => 1,
            5 => 1,

            9 => 1,
            12 => 1,
            13 => 1,

            15 => 1,
            18 => 1,
            19 => 1,
            21 => 1,
            22 => 1,
            23 => 1,
            24 => 1,
            25 => 1,
            27 => 1,
            28 => 1,
            29 => 1,
            30 => 1,
            31 => 1,
            34 => 1,
            37 => 1,
            38 => 1,
            40 => 1,
            43 => 1,
            44 => 1,

            46 => 1,
            49 => 1,
            50 => 1,

            59 => 1,
            62 => 1,
            63 => 1,

            65 => 1,
            68 => 1,
            69 => 1,
            70 => 1,
            72 => 1,
            74 => 1,
            75 => 1,

            80 => 1,
            81 => 1,

            90 => 1,
            91 => 1,
            92 => 1,
            93 => 1,
            94 => 1,

            99 => 1,
            101 => 1,

            103 => 1,
            104 => 2,
            105 => 1,
            106 => 2,
        ];
    }

    /**
     * Returns the lines where warnings should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of warnings that should occur on that line.
     *
     * @return array<int, int>
     */
    public function getWarningList()
    {
        return [];
    }

}
