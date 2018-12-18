## About
- Using php-codesniffer to check PHP coding convention.

## Requirements

- Composer: ^1.8

## Installation

Install xuanquynh/php-codesniffer globally via composer.

```bash
composer global require xuanquynh/php-codesniffer
```

You have to add composer bin directory to $PATH enviroment variable.

```bash
export PATH="$PATH:$HOME/.composer/vendor/bin"
```

Check whether the phpcs have already been installed successfully.

```bash
phpcs -i
```

## Usage

- Check the coding convention of a PHP source code directory.

```bash
phpcs --standard=$HOME/.composer/vendor/xuanquynh/php-codesniffer/phpcs.xml /path/to/source
```
