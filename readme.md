# Formbuilder Field For Backpack (dev)

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![The Whole Fruit Manifesto](https://img.shields.io/badge/writing%20standard-the%20whole%20fruit-brightgreen)](https://github.com/the-whole-fruit/manifesto)

This package add form builder for projects that use the [Backpack for Laravel](https://backpackforlaravel.com/) administration panel.

More exactly, it adds a [FormBuilder](https://formbuilder.online/) and saving in database. It use JQuery and Bootstrap. All data off this form are save in JSon in database.

This package send form by mail or/and creater an enter in form_result database.

## Screenshots

![Backpack Toggle Field Addon](https://github.com/RafyMora/formbuilder-field/blob/b95e8f82c8d8ebe86e65e6a559cd8af0b0ed5560/resources/assets/images/screenshot_2022-03-11.png)

## Requirement

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

> **// TODO: explain to your users how to use the functionality** this package provides; 
> we've provided an example for a Backpack addon that provides a custom field

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
