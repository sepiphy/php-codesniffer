<?php declare(strict_types=1);

/*
 * This file is part of the XuanQuynh package.
 *
 * (c) Quynh Xuan Nguyen <seriquynh@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace XuanQuynh\CodeSniffer;

use Composer\Script\Event;
use PHP_CodeSniffer\Config;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\PhpExecutableFinder;

class ComposerScripts
{
    /**
     * Listen to the "post-autoload-dump" composer event.
     *
     * @param Event $event
     * @return void
     */
    public static function postAutoloadDump(Event $event): void
    {
        $message = sprintf(
            '%s is deprecated since version 1.1 and will be removed in 1.3. Use %s:%s() instead.',
            __METHOD__,
            static::class,
            'loadStandards'
        );
        @trigger_error($message, E_USER_DEPRECATED);

        static::loadStandards($event);
    }

    /**
     * Load standards from "xuanquynh/php-codesniffer" package.
     *
     * @param Event $event
     * @return void
     */
    public static function loadStandards(Event $event): void
    {
        $binDir = $event->getComposer()->getConfig()->get('bin-dir');
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        $baseDir = realpath($vendorDir.'/../');

        require_once $vendorDir.'/autoload.php';

        require_once $vendorDir.'/squizlabs/php_codesniffer/autoload.php';

        $currentPackageName = json_decode(file_get_contents($baseDir.'/composer.json'), true)['name'] ?? null;

        if ($currentPackageName === 'xuanquynh/php-codesniffer') {
            $xqStandardsPath = $baseDir.'/src/Standards';
        } else {
            $xqStandardsPath = $vendorDir.'/xuanquynh/php-codesniffer/src/Standards';
        }

        $installedPaths = Config::getConfigData('installed_paths');

        if (is_null($installedPaths)) {
            $installedPaths = $xqStandardsPath;
        } elseif (strpos($installedPaths, $xqStandardsPath) === false) {
            $installedPaths .= ','.$xqStandardsPath;
        }

        $command = [
            (new PhpExecutableFinder)->find(false), // php binary
            $binDir.'/phpcs',
            '--config-set',
            'installed_paths',
            $installedPaths,
        ];

        // symfony/process 4.2+
        if (function_exists(Process::class.'::fromShellCommandline')) {
            $process = new Process($command);
        } else {
            $process = new Process(implode(' ', $command));
        }

        $process->run();
    }
}
