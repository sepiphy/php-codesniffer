<?php

$header = <<<EOF
This file is part of the XuanQuynh package.

(c) Quynh Xuan Nguyen <seriquynh@gmail.com>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('tests/fixtures')
    ->in(__DIR__.'/src')
;

return PhpCsFixer\Config::create()
    ->setUsingCache(true)
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setRules([
        'declare_strict_types' => true,
        'header_comment' => ['header' => $header],
    ])
;