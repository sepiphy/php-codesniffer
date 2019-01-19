# Checking PHP coding convention by CodeSniffer

## Requirements

- PHP ^5.6.
- Composer.

## Installation

Install `xuanquynh/php-codesniffer` via composer.

```bash
composer require "xuanquynh/php-codesniffer:^0.4" --dev
```

## Usage

Check PHP coding convention of the project code directory.

```bash
vendor/bin/phpcs /path/to/source -p --standard=./vendor/xuanquynh/php-codesniffer/ruleset.xml
```

## Contributing

Thank you for considering contributing to `xuanquynh/php-codesniffer` package!

Feel free to submit an issue or a pull request. All contributions are welcome.

## License

The `xuanquynh/php-codesniffer` package is open-sourced software licensed under the [MIT license](LICENSE.md).
