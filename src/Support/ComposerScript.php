<?php

namespace XuanQuynh\CodeSniffer\Support;

use Composer\Script\Event;
use Illuminate\Filesystem\Filesystem;

class ComposerScript
{
    public static function configureStandards(Event $event)
    {
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');

        require_once $vendorDir.'/autoload.php';

        $files = new Filesystem;

        $files->deleteDirectory($vendorDir.'/../phpcs');

        $files->copyDirectory(
            $vendorDir.'/wataridori/framgia-php-codesniffer',
            $vendorDir.'/squizlabs/php_codesniffer/src/Standards/Framgia'
        );

        $files->copyDirectory(
            $vendorDir.'/xuanquynh/php-codesniffer/src/Convention',
            $vendorDir.'/squizlabs/php_codesniffer/src/Standards/XuanQuynh'
        );
    }
}
