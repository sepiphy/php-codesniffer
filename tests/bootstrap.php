<?php

require_once __DIR__.'/../vendor/squizlabs/php_codesniffer/tests/bootstrap.php';

// Add customized standards.
PHP_CodeSniffer\Config::setConfigData(
    'installed_paths',
    __DIR__.'/../src/XuanQuynh/CodeSniffer/Standards',
    true
);

// Ignore other standards.
$standards = PHP_CodeSniffer\Util\Standards::getInstalledStandards();
$standards[] = 'Generic';

$customizedStandards = ['SunAsterisk', 'XuanQuynh', 'Laravel'];
$ignoredStandardsStr = implode(
    ',',
    array_filter($standards, function ($standard) use ($customizedStandards) {
        return !in_array($standard, $customizedStandards);
    })
);
putenv("PHPCS_IGNORE_TESTS={$ignoredStandardsStr}");
