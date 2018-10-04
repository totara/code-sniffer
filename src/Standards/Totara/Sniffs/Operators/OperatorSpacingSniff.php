<?php
/**
 * @author    Fabian Derschatta <fabian.derschatta@totaralearning.com>
 * @copyright Copyright (C) 2018 onwards Totara Learning Solutions LTD.
 * @license   https://git.totaralearning.com/projects/GENERAL/repos/code-sniffer/browse/licence.txt BSD Licence
 */

namespace TotaraCodeSniffer\Standards\Totara\Sniffs\Operators;

use PHP_CodeSniffer\Standards\PSR12\Sniffs\Operators\OperatorSpacingSniff as PSR12OperatorSpacingSniff;
use PHP_CodeSniffer\Util\Tokens;

class OperatorSpacingSniff extends PSR12OperatorSpacingSniff
{

    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array_unique(
            array_merge(
                Tokens::$comparisonTokens,
                Tokens::$operators,
                Tokens::$assignmentTokens,
                Tokens::$booleanOperators,
                [
                    T_INLINE_THEN,
                    T_INLINE_ELSE,
                    T_INSTANCEOF,
                ]
            )
        );
    }

}
