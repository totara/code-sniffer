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
 * @package totara_userstatus
 */

require 'vendor/autoload.php';

$GLOBALS['PHP_CODESNIFFER_STANDARD_DIRS'] = [];
$GLOBALS['PHP_CODESNIFFER_TEST_DIRS'] = [];

$testNamespaceBase = 'TotaraCodeSniffer\Standards\Totara\Sniffs';
$srcPath = __DIR__.'/src/Standards/Totara/';
$testPath = __DIR__.'/tests/Standards/Totara/Sniffs/';

$testClasses = [];

// Dynamically determine the class names for our test files.
// This is needed for the CodeSniffer unit tests.

$allTestFiles = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($testPath));
$testFiles = new RegexIterator($allTestFiles, '/Test\.php$/');

foreach ($testFiles as $testFile) {
    $namespaceName = '';
    $className = '';
    $tokenStream = new PHP_Token_Stream($testFile->getPathname());
    foreach ($tokenStream as $token) {
        if ($token instanceof PHP_Token_NAMESPACE) {
            $namespaceName = $token->getName();
        }
        if ($token instanceof PHP_Token_CLASS) {
            $className = $token->getName();
        }
    }
    if (strpos($namespaceName, $testNamespaceBase) !== false) {
        $testClasses[] = "{$namespaceName}\\{$className}";
    }
}

foreach ($testClasses as $class) {
    $GLOBALS['PHP_CODESNIFFER_STANDARD_DIRS'][$class] = $srcPath;
    $GLOBALS['PHP_CODESNIFFER_TEST_DIRS'][$class] = $testPath;
}

$GLOBALS['PHP_CODESNIFFER_SNIFF_CODES']   = [];
$GLOBALS['PHP_CODESNIFFER_FIXABLE_CODES'] = [];

require __DIR__.'/vendor/squizlabs/php_codesniffer/tests/bootstrap.php';