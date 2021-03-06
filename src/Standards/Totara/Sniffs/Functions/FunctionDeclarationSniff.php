<?php
/**
 * @author    Fabian Derschatta <fabian.derschatta@totaralearning.com>
 * @copyright Copyright (C) 2018 onwards Totara Learning Solutions LTD.
 * @license   https://git.totaralearning.com/projects/GENERAL/repos/code-sniffer/browse/LICENCE.txt BSD Licence
 */

namespace Totara\CodeSniffer\Standards\Totara\Sniffs\Functions;

use PHP_CodeSniffer\Standards\PEAR\Sniffs\Functions\FunctionDeclarationSniff as PEARFunctionDeclarationSniff;

class FunctionDeclarationSniff extends PEARFunctionDeclarationSniff
{

    public function processSingleLineDeclaration($phpcsFile, $stackPtr, $tokens)
    {
        // Overridden to disable check for braces on the same line
    }

}
