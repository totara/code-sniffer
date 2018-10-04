<?php
/**
 * @author    Fabian Derschatta <fabian.derschatta@totaralearning.com>
 * @copyright Copyright (C) 2018 onwards Totara Learning Solutions LTD.
 * @license   https://git.totaralearning.com/projects/GENERAL/repos/code-sniffer/browse/licence.txt BSD Licence
 */

namespace Totara\CodeSniffer\Standards\Totara\Sniffs\NamingConventions;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

class ValidClassNameUnitTest extends AbstractSniffUnitTest
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
            3 => 1,
            5 => 1,
            7 => 0,
            9 => 0,
            11 => 1,
            13 => 1,
            15 => 1,
            17 => 1,
            19 => 1,
            21 => 1,

            24 => 1,
            26 => 1,
            28 => 0,
            30 => 0,
            32 => 1,
            34 => 1,
            36 => 1,
            38 => 1,
            40 => 1,
            42 => 1,

            44 => 1,
            46 => 1,
            48 => 1,
            50 => 1,
            52 => 1,
            54 => 1,
            56 => 0,
            58 => 0,
            60 => 1,
            62 => 1,
            64 => 1,
            66 => 1,
            68 => 1,
            70 => 1,
            72 => 1,
            74 => 1,
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
