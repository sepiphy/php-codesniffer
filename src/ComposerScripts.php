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
use Sepiphy\PHPTools\ProcessUtils;

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
        $binDir = $event->getComposer()->getConfig()->get('bin-dir');
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');

        require_once $vendorDir.'/autoload.php';

        ProcessUtils::createProcess([
            ProcessUtils::phpBinary(),
            $binDir.'/phpcs',
            '--config-set',
            'installed_paths',
            $vendorDir.'/xuanquynh/php-codesniffer/src/Standards',
        ])->run();
    }
}