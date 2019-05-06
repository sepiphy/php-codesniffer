## About

CodeSniffer for [XuanQuynh Coding Recommendations](https://github.com/xuanquynh/coding-recommendations/).

## Requirements

- PHP ^7.1.3

## Installation

Install `xuanquynh/php-codesniffer` package via composer.

    $ composer require "xuanquynh/php-codesniffer:^1.2" --dev

Load standards whenever `post-autoload-dump` event is triggered.

```json
{
    "scripts": {
        "post-autoload-dump": [
            "XuanQuynh\\CodeSniffer\\ComposerScripts::loadStandards"
        ]
    }
}
```

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
