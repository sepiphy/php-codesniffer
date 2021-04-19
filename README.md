> This package is no longer supported any more. You should refer Laravel, Symfony or any other popular community coding conventions.

# Check and Fix php coding conventions

![Packagist](https://img.shields.io/packagist/dt/sepiphy/php-codesniffer.svg)
![Packagist Version](https://img.shields.io/packagist/v/sepiphy/php-codesniffer?label=version)
![GitHub](https://img.shields.io/github/license/sepiphy/php-codesniffer.svg)

## Installation

Install this package via composer:

    $ composer require sepiphy/php-codesniffer --dev

Verify that our custom standards are available after installing.

    $ vendor/bin/sphpcs -i
    $ The installed coding standards are MySource, PEAR, PSR1, PSR12, PSR2, Squiz, Zend, Symfony, Laravel, Sepiphy and SunAsterisk

## Usage

Check PHP coding conventions of the given directory:

    $ vendor/bin/sphpcs /path/to/source --standard=Sepiphy

Fix PHP coding conventions of the given directory:

    $ vendor/bin/sphpcbf /path/to/source --standard=Sepiphy
