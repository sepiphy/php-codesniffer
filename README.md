![CircleCI (all branches)](https://img.shields.io/circleci/project/github/xuanquynh/php-codesniffer.svg)
![Packagist](https://img.shields.io/packagist/dt/xuanquynh/php-codesniffer.svg)
![Packagist Version](https://img.shields.io/packagist/v/xuanquynh/php-codesniffer.svg?label=version)
![GitHub](https://img.shields.io/github/license/xuanquynh/php-codesniffer.svg)

CodeSniffer for [XuanQuynh Coding Recommendations](https://github.com/xuanquynh/coding-recommendations)

## Requirements

- PHP ^7.1.3

## Installation

Install `xuanquynh/php-codesniffer` package via composer.

    $ composer require xuanquynh/php-codesniffer --dev

Check what standards are available after installing.

    $ vendor/bin/xphpcs -i
    $ The installed coding standards are PEAR, Squiz, MySource, PSR1, Zend, PSR12, PSR2, Symfony, SunAsterisk, Laravel and XuanQuynh

## Usage

Check PHP coding conventions of the given code directory.

    $ vendor/bin/xphpcs /path/to/code --standard=XuanQuynh
    $ vendor/bin/xphpcbf /path/to/code --standard=XuanQuynh
