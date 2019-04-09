## About

CodeSniffer for [XuanQuynh Coding Recommendations](https://github.com/xuanquynh/coding-recommendations/).

## Requirements

- PHP ^7.1.3

## Installation

Install `xuanquynh/php-codesniffer` package globally via composer.

    $ composer global require "xuanquynh/php-codesniffer:^1.2" --dev

Load standards whenever `post-autoload-dump` event is triggered.

> You have to add `XuanQuynh\\CodeSniffer\\ComposerScripts::loadStandards` to `composer.json` file manually if `scripts.post-autoload-dump` has been already defined.

    $ composer global config scripts.post-autoload-dump "XuanQuynh\\CodeSniffer\\ComposerScripts::loadStandards"

Check what standards are available after installing.

    $ phpcs -i # These are additional standards: SunAsterisk, XuanQuynh and Laravel.

## Usage

Check PHP coding convention of the given code directory.

    $ phpcs /path/to/code --standard=SunAsterisk
    $ phpcs /path/to/code --standard=XuanQuynh
    $ phpcs /path/to/code --standard=Laravel

> To use `xuanquynh/php-codesniffer` package locally via composer, you just need to run composer without "global" command.

## Contributing

Thank you for considering contributing to `xuanquynh/php-codesniffer` package!

Feel free to submit an issue or a pull request for your expectation!

All contributions are welcome and accepted via pull requests.

## License

The `xuanquynh/php-codesniffer` package is open-sourced software licensed under the [MIT license](LICENSE.md).
