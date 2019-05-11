![CircleCI (all branches)](https://img.shields.io/circleci/project/github/xuanquynh/php-codesniffer.svg)
![Packagist](https://img.shields.io/packagist/dt/xuanquynh/php-codesniffer.svg)
![Packagist Version](https://img.shields.io/packagist/v/xuanquynh/php-codesniffer.svg?label=version)
![GitHub](https://img.shields.io/github/license/xuanquynh/php-codesniffer.svg)

CodeSniffer for [XuanQuynh Coding Recommendations](https://github.com/xuanquynh/coding-recommendations/).

## Requirements

- PHP ^7.1.3

## Installation

Install `xuanquynh/php-codesniffer` package via composer.

    $ composer require "xuanquynh/php-codesniffer:1.2.*" --dev

Define the `load-coding-standards` composer script and execute it.

```json
{
    "scripts": {
        "load-coding-standards": [
            "XuanQuynh\\CodeSniffer\\ComposerScripts::loadStandards"
        ]
    }
}
```
    $ composer run load-coding-standards

Check what standards are available after installing.

    $ vendor/bin/phpcs -i # These are additional standards: SunAsterisk, XuanQuynh and Laravel.

## Usage

Check PHP coding convention of the given code directory.

    $ vendor/bin/phpcs /path/to/code --standard=SunAsterisk
    $ vendor/bin/phpcs /path/to/code --standard=XuanQuynh
    $ vendor/bin/phpcs /path/to/code --standard=Laravel

## Contributing

Please read the [contribution guide](https://seriquynh.com/oss?project=xuanquynh/php-codesniffer) for more information.

## License

This project is open-sourced software licensed under the [MIT license](LICENSE.md).
