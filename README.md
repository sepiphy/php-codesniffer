![Packagist](https://img.shields.io/packagist/dt/sepiphy/php-codesniffer.svg)
![Packagist Version](https://img.shields.io/packagist/v/sepiphy/php-codesniffer.svg?label=version)
![GitHub](https://img.shields.io/github/license/sepiphy/php-codesniffer.svg)

CodeSniffer for [Sepiphy Coding Recommendations](https://github.com/sepiphy/coding-recommendations)

## Requirements

- PHP ^7.1.3

## Installation

Install `sepiphy/php-codesniffer` package via composer.

    $ composer require sepiphy/php-codesniffer --dev

Check what standards are available after installing.

    $ vendor/bin/xphpcs -i
    $ The installed coding standards are MySource, PEAR, PSR1, PSR12, PSR2, Squiz, Zend, Symfony, Laravel, Sepiphy and SunAsterisk

## Usage

Check PHP coding conventions of the given directory.

    $ vendor/bin/xphpcs /path/to/source --standard=Sepiphy

Fix PHP coding conventions of the given directory.

    $ vendor/bin/xphpcbf /path/to/source --standard=Sepiphy
