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
use PHP_CodeSniffer\Sniffs\AbstractScopeSniff;
use PHP_CodeSniffer\Util\Tokens;

class LowerCaseFunctionNameSniff extends AbstractScopeSniff
{

    /**
     * A list of all PHP magic methods.
     *
     * @var array
     */
    protected $magicMethods = [
        'construct',
        'destruct',
        'call',
        'callStatic',
        'get',
        'set',
        'isset',
        'unset',
        'sleep',
        'wakeup',
        'toString',
        'set_state',
        'clone',
        'invoke',
        'debugInfo',
    ];

    /**
     * A list of all PHP non-magic methods starting with a double underscore.
     *
     * These come from PHP modules such as SOAPClient.
     *
     * @var array
     */
    protected $methodsDoubleUnderscore = [
        'soapCall',
        'getLastRequest',
        'getLastResponse',
        'getLastRequestHeaders',
        'getLastResponseHeaders',
        'getFunctions',
        'getTypes',
        'doRequest',
        'setCookie',
        'setLocation',
        'setSoapheaders',
    ];

    /**
     * A list of all PHP magic functions.
     *
     * @var array
     */
    protected $magicFunctions = ['autoload'];

    /**
     * If TRUE, the string must not have two capital letters next to each other.
     *
     * @var boolean
     */
    public $strict = true;

    /**
     * Constructs a Generic_Sniffs_NamingConventions_CamelCapsFunctionNameSniff.
     */
    public function __construct()
    {
        parent::__construct(Tokens::$ooScopeTokens, [T_FUNCTION], true);
    }

    /**
     * Processes the tokens within the scope.
     *
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The file being processed.
     * @param int $stackPtr The position where this token was
     *                                               found.
     * @param int $currScope The position of the current scope.
     *
     * @return void
     */
    protected function processTokenWithinScope(File $phpcsFile, $stackPtr, $currScope)
    {
        $methodName = $phpcsFile->getDeclarationName($stackPtr);
        if ($methodName === null) {
            // Ignore closures.
            return;
        }

        $className = $phpcsFile->getDeclarationName($currScope);
        $errorData = [$className . '::' . $methodName];

        // Is this a magic method. i.e., is prefixed with "__" ?
        if (preg_match('|^__[^_]|', $methodName) !== 0) {
            $filterCallback = function ($carry, $item) use ($methodName) {
                if (strtolower(substr($methodName, 2)) == strtolower($item)) {
                    $carry .= $item;
                } else {
                    $carry .= '';
                }
                return $carry;
            };

            $filteredMagic = array_reduce($this->magicMethods, $filterCallback);
            if (empty($filteredMagic)) {
                $filteredMagic = array_reduce($this->methodsDoubleUnderscore, $filterCallback);
            }
            if (!empty($filteredMagic)) {
                // Upper and lower case has to match exactly
                if (substr($methodName, 2) !== $filteredMagic) {
                    $errorData[] = '__' . $filteredMagic;
                    $error = 'Magic method name "%s" is invalid; method name must match %s';
                    $phpcsFile->addError($error, $stackPtr, 'MagicMethodLowerCase', $errorData);
                }
                return;
            }

            $error = 'Method name "%s" is invalid; only PHP magic methods should be prefixed with a double underscore';
            $phpcsFile->addError($error, $stackPtr, 'MethodDoubleUnderscore', $errorData);
            return;
        }

        $methodProps = $phpcsFile->getMethodProperties($stackPtr);
        if (preg_match('/^[a-z][a-z0-9_]+$/', $methodName) === 0) {
            if ($methodProps['scope_specified'] === true) {
                $error = '%s method name "%s" must contain only lower case letters, numbers and underscores, starting with a letter';
                $data = [
                    ucfirst($methodProps['scope']),
                    $errorData[0],
                ];
                $phpcsFile->addError($error, $stackPtr, 'ScopeLowerCaseUnderscores', $data);
            } else {
                $error = 'Method name "%s" must contain only lower case letters, numbers and underscores, starting with a letter';
                $phpcsFile->addError($error, $stackPtr, 'LowerCaseUnderscores', $errorData);
            }

            $phpcsFile->recordMetric($stackPtr, 'lower_case method name', 'no');
            return;
        } else {
            $phpcsFile->recordMetric($stackPtr, 'lower_case method name', 'yes');
        }
    }

    /**
     * Processes the tokens outside the scope.
     *
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The file being processed.
     * @param int $stackPtr The position where this token was
     *                                               found.
     *
     * @return void
     */
    protected function processTokenOutsideScope(File $phpcsFile, $stackPtr)
    {
        $functionName = $phpcsFile->getDeclarationName($stackPtr);
        if ($functionName === null) {
            // Ignore closures.
            return;
        }

        $errorData = [$functionName];

        // Is this a magic function. i.e., it is prefixed with "__".
        if (preg_match('|^__[^_]|', $functionName) !== 0) {
            $filterCallback = function ($carry, $item) use ($functionName) {
                if (strtolower(substr($functionName, 2)) == strtolower($item)) {
                    $carry .= $item;
                } else {
                    $carry .= '';
                }
                return $carry;
            };

            $filteredMagic = array_reduce($this->magicFunctions, $filterCallback);
            if (!empty($filteredMagic)) {
                // Upper and lower case has to match exactly
                if (substr($functionName, 2) !== $filteredMagic) {
                    $errorData[] = '__' . $filteredMagic;
                    $error = 'Magic function name "%s" is invalid; method name must match %s';
                    $phpcsFile->addError($error, $stackPtr, 'MagicFunctionLowerCase', $errorData);
                }
                return;
            }

            $error = 'Function name "%s" is invalid; only PHP magic methods should be prefixed with a double underscore';
            $phpcsFile->addError($error, $stackPtr, 'FunctionDoubleUnderscore', $errorData);
            return;
        }

        if (preg_match('/^[a-z][a-z0-9_]+$/', $functionName) === 0) {
            $error = 'Function name "%s" must contain only lower case letters, numbers and underscores, starting with a letter';
            $phpcsFile->addError($error, $stackPtr, 'LowerCaseUnderscores', $errorData);
            $phpcsFile->recordMetric($stackPtr, 'lower_case function name', 'no');
        } else {
            $phpcsFile->recordMetric($stackPtr, 'lower_case method name', 'yes');
        }
    }

}
