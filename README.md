## About

Check PHP coding convention by CodeSniffer. Support [XuanQuynh Coding Recommendations](https://github.com/xuanquynh/coding-recommendations/).

## Requirements

- PHP: ^7.2
- Composer: *

## Installation

Install `xuanquynh/php-codesniffer` package via composer.

```bash
composer require "xuanquynh/php-codesniffer:^1.0-dev" --dev
```

Load standards whenever `post-autoload-dump` event is triggered.

```json
{
    "scripts": {
        "post-autoload-dump": [
            "@php vendor/bin/phpcs --config-set installed_paths vendor/xuanquynh/php-codesniffer/src/Standards"
        ]
    }
}
```

Check what standards are available after installing.

```bash
vendor/bin/phpcs -i
# The installed coding standards are PEAR, Squiz, MySource, PSR1, Zend, PSR12, PSR2, SunAsterisk and XuanQuynh
```

## Usage

Check PHP coding convention of the given code directory.

```bash
vendor/bin/phpcs /path/to/code --standard=SunAsterisk
vendor/bin/phpcs /path/to/code --standard=XuanQuynh
```

## Contributing

- Thank you for considering contributing to `xuanquynh/php-codesniffer` package!

- Feel free to submit an issue or a pull request about your expectation!

- All contributions are welcome and accepted via pull requests.

## License

- The `xuanquynh/php-codesniffer` package is open-sourced software licensed under the [MIT license](LICENSE.md).
