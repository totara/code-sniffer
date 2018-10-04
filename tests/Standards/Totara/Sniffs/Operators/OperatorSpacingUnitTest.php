<?php
/**
 * @author    Fabian Derschatta <fabian.derschatta@totaralearning.com>
 * @copyright Copyright (C) 2018 onwards Totara Learning Solutions LTD.
 * @license   https://git.totaralearning.com/projects/GENERAL/repos/code-sniffer/browse/LICENCE.txt BSD Licence
 */

namespace Totara\CodeSniffer\Standards\Totara\Sniffs\Operators;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

class OperatorSpacingUnitTest extends AbstractSniffUnitTest
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
            3 => 2,
            4 => 1,
            5 => 2,
            6 => 2,
            9 => 3,
            10 => 2,
            11 => 3,
            13 => 3,
            14 => 2,
            18 => 1,
            20 => 1,
            22 => 2,
            23 => 2,
            26 => 1,
            37 => 4,
            39 => 1,
            40 => 1,
            44 => 2,
            47 => 2,
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
