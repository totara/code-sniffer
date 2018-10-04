<?php
/**
 * @author    Fabian Derschatta <fabian.derschatta@totaralearning.com>
 * @copyright Copyright (C) 2018 onwards Totara Learning Solutions LTD.
 * @license   https://git.totaralearning.com/projects/GENERAL/repos/code-sniffer/browse/licence.txt BSD Licence
 */

namespace TotaraCodeSniffer\Standards\Totara\Sniffs\NamingConventions;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class ValidClassNameSniff implements Sniff
{

    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return [
            T_CLASS,
            T_INTERFACE,
            T_TRAIT,
        ];
    }

    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The current file being processed.
     * @param int $stackPtr The position of the current token
     *                                               in the stack passed in $tokens.
     *
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $className = $phpcsFile->findNext(T_STRING, $stackPtr);
        $name = trim($tokens[$className]['content']);
        $errorData = [ucfirst($tokens[$stackPtr]['content'])];

        if (preg_match('/^[a-z][a-z0-9_]*$/', $name) === 0) {
            $error = '%s name must contain only lower case letters, numbers and underscores, starting with a letter';
            $phpcsFile->addError($error, $stackPtr, 'LowerCaseUnderscores', $errorData);
        }
    }

}
