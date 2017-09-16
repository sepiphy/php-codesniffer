# Package used to check PHP coding convention
### About
- Using php-codesniffer to check PHP coding convention.
### Installation
- Install php-codesniffer globally via composer.
```
composer global require "squizlabs/php_codesniffer=^2.2.*"
```
- Check if php-codesniffer is installed sucessfully.
```
phpcs -i
```
- Clone own php-codesniffer repository.
```
git clone https://github.com/xuanquynh/php-codesniffer <Directory>
```
-- Check own source code.
```
phpcs --standard=/path/to/phpcs.xml /path/to/source --encoding=utf-8
```
