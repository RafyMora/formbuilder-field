# Formbuilder Panel In Backpackforlaravel

[![GitHub release](https://img.shields.io/github/release/RafyMora/formbuilder-field.svg?style=flat-square)](https://GitHub.com/RafyMora/formbuilder-field/releases/)
[![GitHub latest commit](https://img.shields.io/github/last-commit/RafyMora/formbuilder-field.svg?style=flat-square)](https://github.com/RafyMora/formbuilder-field/commit/main/)
[![Github all releases](https://img.shields.io/github/downloads/RafyMora/formbuilder-field/total.svg?style=flat-square)](https://GitHub.com/RafyMora/formbuilder-field/releases/)

<!--- [![Latest Version on Packagist][ico-version]][link-packagist] -->
<!--- [![Total Downloads][ico-downloads]][link-downloads] -->

This package add form builder for projects that use the [Backpack for Laravel](https://backpackforlaravel.com/) administration panel.

More exactly, it adds a [FormBuilder](https://formbuilder.online/) and saving in database. It use JQuery and Bootstrap. All data off this form are save in JSon in database.

This package send form by mail or/and creater an enter in form_result database.

## Screenshots

![Backpack Toggle Field Addon](https://github.com/RafyMora/formbuilder-field/blob/b95e8f82c8d8ebe86e65e6a559cd8af0b0ed5560/resources/assets/images/screenshot_2022-03-11.png)

## Requirement

[![Generic badge](https://img.shields.io/badge/backpackforlaravel->v4.1-blue.svg?style=flat-square)](https://backpackforlaravel.com/)
[![Generic badge](https://img.shields.io/badge/php->v7.4-blue.svg?style=flat-square)](https://backpackforlaravel.com/)

This package it's compatible for Laravel 7.x|8.x, And bakcpackforlaravel 4.1|5.x
It's juste an addon for backpack.

## Installation

Install laravel environnement and backpack crud panel or add in your project.

### Via Composer

``` bash
# package basic installation
composer require rafy-mora/formbuilder-field

# Command to execute migration and publishing provider for finish installation
php artisan formbuilderfield:installation
```

## Usage

For display form, juste call an helper function with form's uuid.

``` php
// in blade or juste php
{{ renderFormBuilder(<FORM_UUID>) }}
```

## Overwriting

> **// TODO: explain to your users how to overwrite the functionality this package provides;**
> we've provided an example for a custom field

## Change log

>**// TODO: Changes are documented here on Github. Please see the [Releases tab](https://github.com/rafy-mora/formbuilder-field/releases).

## Contributing

Just me for the moment

## Security

If you discover any security related issues, please email contact@raphael-mora.fr instead of using the issue tracker.

## Credits

- Raphael Mora

## License

This project was released under MIT, so you can install it on top of any Backpack & Laravel project. Please see the [license file](license.md) for more information. 

However, please note that you do need Backpack installed, so you need to also abide by its [YUMMY License](https://github.com/Laravel-Backpack/CRUD/blob/master/LICENSE.md). That means in production you'll need a Backpack license code. You can get a free one for non-commercial use (or a paid one for commercial use) on [backpackforlaravel.com](https://backpackforlaravel.com).


[ico-version]: https://img.shields.io/packagist/v/rafy-mora/formbuilder-field.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/rafy-mora/formbuilder-field.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/rafy-mora/formbuilder-field
[link-downloads]: https://packagist.org/packages/rafy-mora/formbuilder-field
[link-author]: https://github.com/rafy-mora
[link-contributors]: ../../contributors
