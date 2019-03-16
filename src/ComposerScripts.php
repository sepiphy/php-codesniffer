<?php

namespace XuanQuynh\CodeSniffer;

use Composer\Script\Event;
use Illuminate\Support\ProcessUtils;
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
    public static function postAutoloadDump(Event $event)
    {
        $binDir = $event->getComposer()->getConfig()->get('bin-dir');
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');

        require_once $vendorDir.'/autoload.php';

        $process = new Process(implode(' ', [
            static::phpBinary(),
            $binDir.'/phpcs',
            '--config-set',
            'installed_paths',
            $vendorDir.'/xuanquynh/php-codesniffer/src/Standards',
        ]));

        $process->run();
    }

    protected static function phpBinary()
    {
        return ProcessUtils::escapeArgument((new PhpExecutableFinder)->find(false));
    }
}
