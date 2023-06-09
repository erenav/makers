# Custom Laravel Make Commands

[![Latest Version on Packagist](https://img.shields.io/packagist/v/erenav/makers.svg?style=flat-square)](https://packagist.org/packages/erenav/makers)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/erenav/makers/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/erenav/makers/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/erenav/makers.svg?style=flat-square)](https://packagist.org/packages/erenav/makers)

Custom `artisan make` commands for Laravel applications.

## Installation

You can install the package via composer:

```bash
composer require erenav/makers --dev
```

You can publish the stubs with:

```bash
php artisan makers:publish-stubs
```

Use the `--force` option to override previously published stubs.

You can publish the config file with:

```bash
php artisan vendor:publish --tag="makers-config"
```

## Commands

```bash
php artisan makers:action {name}                         Create a new action class
php artisan makers:dto {name} {--readonly} {--factory}   Create a new dto class
php artisan makers:enum {name} {--backed=}               Create a new enum class
php artisan makers:generic-factory {name} {--import=}    Create a new generic factory class
php artisan makers:macros {name}                         Create a new macro class
php artisan makers:pipe {name}                           Create a new pipe class
php artisan makers:state {name} {implementations?}       Create a new state classes
php artisan makers:state-implementation {name} {parent}  Create a new state implementation classes
php artisan makers:state-transition {name} {model}       Create a new state transition class
php artisan makers:value-object {name} {--cast}          Create a new value object class (with an optional cast class)
```

### Note

All commands have access to the `--force` option. Including this option allows for the override of existing files.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Vanere Maynard](https://github.com/vanere)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
