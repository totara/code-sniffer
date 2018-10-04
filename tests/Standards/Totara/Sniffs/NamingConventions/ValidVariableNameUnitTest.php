<?php
/**
 * @author    Fabian Derschatta <fabian.derschatta@totaralearning.com>
 * @copyright Copyright (C) 2018 onwards Totara Learning Solutions LTD.
 * @license   https://git.totaralearning.com/projects/GENERAL/repos/code-sniffer/browse/licence.txt BSD Licence
 */

namespace Totara\CodeSniffer\Standards\Totara\Sniffs\NamingConventions;

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
