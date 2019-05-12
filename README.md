![CircleCI (all branches)](https://img.shields.io/circleci/project/github/xuanquynh/php-codesniffer.svg)
![Packagist](https://img.shields.io/packagist/dt/xuanquynh/php-codesniffer.svg)
![Packagist Version](https://img.shields.io/packagist/v/xuanquynh/php-codesniffer.svg?label=version)
![GitHub](https://img.shields.io/github/license/xuanquynh/php-codesniffer.svg)

CodeSniffer for [XuanQuynh Coding Recommendations](https://github.com/xuanquynh/coding-recommendations).

## Requirements

- PHP ^7.1.3

## Installation

Install `xuanquynh/php-codesniffer` package via composer.

    $ composer require xuanquynh/php-codesniffer --dev

Configure `installed_path` to help `phpcs` load customized sniffers.

    $ vendor/bin/phpcs --config-set installed_paths vendor/escapestudios/symfony2-coding-standard,vendor/xuanquynh/php-codesniffer/src/Standards

Check what standards are available after installing.

    $ vendor/bin/phpcs -i
    $ The installed coding standards are PEAR, Squiz, MySource, PSR1, Zend, PSR12, PSR2, Symfony, SunAsterisk, Laravel and XuanQuynh

## Usage

Check PHP coding convention of the given code directory.

    $ vendor/bin/phpcs /path/to/code --standard=XuanQuynh

## Contributing

Please read the [contribution guide](https://seriquynh.com/oss/contributing?github=xuanquynh/php-codesniffer) for more information.

## License

Please read the [MIT license](LICENSE.md) for more information.
