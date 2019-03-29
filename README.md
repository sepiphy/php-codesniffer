## About

CodeSniffer for [XuanQuynh Coding Recommendations](https://github.com/xuanquynh/coding-recommendations/).

## Requirements

- PHP ^7.1.3
- Composer *

## Installation

Install `xuanquynh/php-codesniffer` package via composer.

```bash
composer require "xuanquynh/php-codesniffer:^1.1" --dev
```

Load standards whenever `post-autoload-dump` event is triggered.

```json
{
    "scripts": {
        "post-autoload-dump": [
            "XuanQuynh\\CodeSniffer\\ComposerScripts::postAutoloadDump"
        ]
    }
}
```

Check what standards are available after installing.

```bash
vendor/bin/phpcs -i
# You may these additional standards: SunAsterisk, Laravel and XuanQuynh.
```

## Usage

Check PHP coding convention of the given code directory.

```bash
vendor/bin/phpcs /path/to/code --standard=SunAsterisk
vendor/bin/phpcs /path/to/code --standard=XuanQuynh
vendor/bin/phpcs /path/to/code --standard=Laravel
```

## Contributing

- Thank you for considering contributing to `xuanquynh/php-codesniffer` package!

- Feel free to submit an issue or a pull request for your expectation!

- All contributions are welcome and accepted via pull requests.

## License

- The `xuanquynh/php-codesniffer` package is open-sourced software licensed under the [MIT license](LICENSE.md).
