# A Filament widget that displays daily inspirational quotes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/abrardev/inspire-widget.svg?style=flat-square)](https://packagist.org/packages/abrardev/inspire-widget)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/abrardev/inspire-widget/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/abrardev/inspire-widget/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/abrardev/inspire-widget/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/abrardev/inspire-widget/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/abrardev/inspire-widget.svg?style=flat-square)](https://packagist.org/packages/abrardev/inspire-widget)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require abrardev/inspire-widget
```


Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="inspire-widget-views"
```


## Usage

### Register Plugin
In your Filament panel provider, register the plugin as
```php
use AbrarDev\InspireWidget\InspireWidgetPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            InspireWidgetPlugin::make()
        ])
}
```

### Active Widget
You can activate widget on dashboard page as follows:
```php
use AbrarDev\InspireWidget\Widget\InspireWidget;

public function panel(Panel $panel): Panel
{
    return $panel
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
                InspireWidget::class,
            ])
}
```
InspireWidget will show on top since it has top sorting.

### Customization
#### Providing your own quotes
You can use plugin to provide an array of your own quotes and Widget will pick them randomally as follows
```php
use AbrarDev\InspireWidget\InspireWidgetPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            InspireWidgetPlugin::make()
                ->quotes([
                        'The only limit to our realization of tomorrow is our doubts of today.',
                        'The future belongs to those who believe in the beauty of their dreams.',
                        'Do not wait to strike till the iron is hot, but make it hot by striking.',
                    ])
        ])
}
```

#### Providing your own image
You can also provide your own image. Make sure image is 2084 x 252
```php
use AbrarDev\InspireWidget\InspireWidgetPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            InspireWidgetPlugin::make()
                ->image(
                    new Image(asset('vendor/inspire-widget/images/patrick-carr-pAoo1Rs1Yy8-unsplash.jpg'),
                        __('Photo by :author on :service')
                    )
                )
        ])
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Abrar Ahmad](https://github.com/abrardev99)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
