<?php declare(strict_types=1);

/*
 * This file is part of the Sepiphy package.
 *
 * (c) Quynh Xuan Nguyen <seriquynh@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__.'/../vendor/squizlabs/php_codesniffer/tests/bootstrap.php';

// Add customized standards.
PHP_CodeSniffer\Config::setConfigData(
    'installed_paths',
    __DIR__.'/../src/Standards',
    true
);

// Ignore other standards.
$standards = PHP_CodeSniffer\Util\Standards::getInstalledStandards();
$standards[] = 'Generic';

$customizedStandards = ['SunAsterisk', 'Sepiphy', 'Laravel'];
$ignoredStandardsStr = implode(
    ',',
    array_filter($standards, function ($standard) use ($customizedStandards) {
        return !in_array($standard, $customizedStandards);
    })
);
putenv("PHPCS_IGNORE_TESTS={$ignoredStandardsStr}");
require __DIR__.'/../vendor/squizlabs/php_codesniffer/tests/Standards/AllSniffs.php';
