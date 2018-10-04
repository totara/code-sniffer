<?php
/**
 * @author    Fabian Derschatta <fabian.derschatta@totaralearning.com>
 * @copyright Copyright (C) 2018 onwards Totara Learning Solutions LTD.
 * @license   https://git.totaralearning.com/projects/GENERAL/repos/code-sniffer/browse/licence.txt BSD Licence
 */

require 'vendor/autoload.php';

$GLOBALS['PHP_CODESNIFFER_STANDARD_DIRS'] = [];
$GLOBALS['PHP_CODESNIFFER_TEST_DIRS'] = [];

$testNamespaceBase = 'Totara\CodeSniffer\Standards\Totara\Sniffs';
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