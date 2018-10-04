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

namespace TotaraCodeSniffer\Standards\Totara\Sniffs\NamingConventions;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

class ValidFunctionNameUnitTest extends AbstractSniffUnitTest
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
        $errors = [
            6 => 1,
            7 => 1,
            9 => 1,
            10 => 1,
            12 => 1,
            13 => 1,

            15 => 1,
            16 => 1,

            19 => 1,
            20 => 1,
            21 => 1,

            23 => 1,
            24 => 1,

            29 => 1,
            30 => 1,
            32 => 1,

            51 => 1,
            53 => 1,
            54 => 1,

            58 => 1,
            59 => 1,
            60 => 1,
            61 => 1,
            62 => 1,
            63 => 1,
            64 => 1,
            65 => 1,
            66 => 1,
            67 => 1,
            68 => 1,
            69 => 1,
            70 => 1,
            72 => 1,
            73 => 1,
            74 => 1,

            97 => 1,
            98 => 1,
            99 => 1,

            101 => 1,

            116 => 1,

            121 => 1,
            124 => 1,

            142 => 1,
            144 => 1,
            145 => 1,
        ];

        return $errors;
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
