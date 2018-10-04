<?php
/**
 * @author    Fabian Derschatta <fabian.derschatta@totaralearning.com>
 * @copyright Copyright (C) 2018 onwards Totara Learning Solutions LTD.
 * @license   https://git.totaralearning.com/projects/GENERAL/repos/code-sniffer/browse/licence.txt BSD Licence
 */

namespace Totara\CodeSniffer\Standards\Totara\Sniffs\Arrays;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

class ArrayDeclarationUnitTest extends AbstractSniffUnitTest
{

    /**
     * Returns the lines where errors should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of errors that should occur on that line.
     *
     * @param string $testFile The name of the file being tested.
     *
     * @return array<int, int>
     */
    public function getErrorList($testFile = '')
    {
        switch ($testFile) {
            case 'ArrayDeclarationUnitTest.1.inc':
                return [
                    7 => 1,
                    9 => 1,
                    20 => 1,
                    31 => 1,
                    37 => 1,
                    38 => 2,
                    39 => 2,
                    44 => 1,
                    46 => 6,
                    47 => 2,
                    49 => 2,
                    50 => 4,
                    53 => 2,
                ];
            case 'ArrayDeclarationUnitTest.2.inc':
                return [
                    27 => 1,
                    28 => 2,
                    29 => 2,
                    34 => 6,
                    35 => 2,
                    37 => 2,
                    38 => 4,
                    41 => 2,
                ];
            default:
                return [];
        }
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
