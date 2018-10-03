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

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\AbstractVariableSniff;

class ValidVariableNameSniff extends AbstractVariableSniff
{

    protected $totaraReservedWords = [
        'DB' => true,
        'CFG' => true,
        'OUTPUT' => true,
        'PAGE' => true,
        'USER' => true,
        'ADMIN' => true,
        'COMP_AGGREGATION' => true,
        'COURSE' => true,
        'SITE' => true,
        'SESSION' => true,
        'TOTARA' => true,
        'COHORT_VISIBILITY' => true,
        'COHORT_ASSN_VALUES' => true,
        'COHORT_ASSN_ITEMTYPES' => true,
        'COHORT_ALERT' => true,
        'FILEPICKER_OPTIONS' => true,
        'TOTARA_COURSE_TYPES' => true,
        'XMLDB' => true,
        'TEXTAREA_OPTIONS' => true,
    ];

    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The file being scanned.
     * @param int $stackPtr The position of the current token in the
     *                                               stack passed in $tokens.
     *
     * @return void
     */
    protected function processVariable(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $varName = ltrim($tokens[$stackPtr]['content'], '$');

        // If it's a reserved var, then its ok.
        if (isset($this->phpReservedVars[$varName]) || isset($this->totaraReservedWords[$varName])) {
            return;
        }

        $objOperator = $phpcsFile->findNext([T_WHITESPACE], ($stackPtr + 1), null, true);
        if ($tokens[$objOperator]['code'] === T_OBJECT_OPERATOR) {
            // Check to see if we are using a variable from an object.
            $var = $phpcsFile->findNext([T_WHITESPACE], ($objOperator + 1), null, true);
            if ($tokens[$var]['code'] === T_STRING) {
                // Either a var name or a function call, so check for bracket.
                $bracket = $phpcsFile->findNext([T_WHITESPACE], ($var + 1), null, true);

                if ($tokens[$bracket]['code'] !== T_OPEN_PARENTHESIS) {
                    $objVarName = $tokens[$var]['content'];

                    if (preg_match('/^[a-z][a-z0-9_]*$/', $objVarName) === 0) {
                        $data = [$objVarName];
                        $error = 'Variable "%s" must contain only lower case letters, numbers and underscores, starting with a letter';
                        $phpcsFile->addError($error, $stackPtr, 'LowerCaseUnderscores', $data);
                    }
                }
            }
        }

        if (preg_match('/^[a-z][a-z0-9_]*$/', $varName) === 0) {
            $data = [$varName];
            $error = 'Variable "%s" must contain only lower case letters, numbers and underscores, starting with a letter';
            $phpcsFile->addError($error, $stackPtr, 'LowerCaseUnderscores', $data);
        }
    }

    /**
     * Processes class member variables.
     *
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The file being scanned.
     * @param int $stackPtr The position of the current token in the
     *                                               stack passed in $tokens.
     *
     * @return void
     */
    protected function processMemberVar(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $varName = ltrim($tokens[$stackPtr]['content'], '$');
        $memberProps = $phpcsFile->getMemberProperties($stackPtr);
        if (empty($memberProps) === true) {
            // Exception encountered.
            return;
        }

        if (preg_match('/^[a-z][a-z0-9_]*$/', $varName) === 0) {
            $data = [$varName];
            $error = 'Member variable "%s" must contain only lower case letters, numbers and underscores, starting with a letter';
            $phpcsFile->addError($error, $stackPtr, 'LowerCaseUnderscores', $data);
        }
    }

    /**
     * Processes the variable found within a double quoted string.
     *
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The file being scanned.
     * @param int $stackPtr The position of the double quoted
     *                                               string.
     *
     * @return void
     */
    protected function processVariableInString(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        if (preg_match_all(
            '|[^\\\]\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)|',
            $tokens[$stackPtr]['content'],
            $matches
        ) !== 0) {
            foreach ($matches[1] as $varName) {
                // If it's a reserved var, then its ok.
                if (isset($this->phpReservedVars[$varName]) || isset($this->totaraReservedWords[$varName])) {
                    return;
                }

                if (preg_match('/^[a-z][a-z0-9_]*$/', $varName) === 0) {
                    $data = [$varName];
                    $error = 'Variable "%s" must contain only lower case letters, numbers and underscores, starting with a letter';
                    $phpcsFile->addError($error, $stackPtr, 'LowerCaseUnderscores', $data);
                }
            }
        }
    }

}
