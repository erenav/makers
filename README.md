# Custom Laravel Make Commands

[![Latest Version on Packagist](https://img.shields.io/packagist/v/erenav/makers.svg?style=flat-square)](https://packagist.org/packages/erenav/makers)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/erenav/makers/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/erenav/makers/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/erenav/makers.svg?style=flat-square)](https://packagist.org/packages/erenav/makers)

Opinionated custom `artisan make` commands for Laravel applications.

## Installation

Install this package via composer using the following command:

```bash
composer require erenav/makers --dev
```

## Commands

### Actions

Action classes simplify application logic by consolidating specific tasks into single classes that can be executed from
controllers, jobs, listeners etc. This approach improves code reuse and simplifies maintenance.

```bash
php artisan make:action {name}
```

### Data Transfer Objects (DTOs)

DTOs are used to contain data in a structured way, facilitating data transfer across different layers of an application
while keeping the data encapsulated and organized.

```bash
php artisan make:dto {name}
```

```bash
php artisan make:dto {name} {--readonly}
```

### Enum

Enums are useful when representing a fixed set of possible values for a variable. They also improve type safety and
readability.

```bash
php artisan make:enum {name}
```

```bash
php artisan make:enum {name} {--type=int|string}
```

### Mixin

Mixins provide a way to add custom methods to existing classes provided by the framework without modifying the
framework's source code.

```bash
php artisan make:mixin {name}
```

### Pipe

Pipes are commonly used for data transformation, validation, or any series of operations that need to be performed in
sequence on an object or value.

```bash
php artisan make:pipe {name}
```

### States

States can represent different statuses or stages of a model, making it easier to handle state transitions and enforce
business rules associated with those states.

```bash
php artisan make:states {base} {states*}
```

```bash
php artisan make:state {state} {base}
```

### Value Object

Value objects encapsulate related properties and behavior for a value into a single, immutable object. This pattern
enhances code clarity, enforce validation, and promote a more object-oriented approach to managing complex data types.

```bash
php artisan make:value-object {name}
```

## Note

All commands have access to the `--force` option. Including this option allows for the override of existing files.

## Customize

You can publish the stubs with:

```bash
php artisan makers:publish-stubs
```

Use the `--force` option to override previously published stubs.

You can publish the config file with:

```bash
php artisan vendor:publish --tag="makers-config"
```

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
