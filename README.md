# enum-validation

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/enum-validation-laravel)](https://github.com/brokeyourbike/enum-validation-laravel/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/enum-validation/downloads)](https://packagist.org/packages/brokeyourbike/enum-validation)
[![Maintainability](https://api.codeclimate.com/v1/badges/0b55be737df44cdcd3a7/maintainability)](https://codeclimate.com/github/brokeyourbike/enum-validation-laravel/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/0b55be737df44cdcd3a7/test_coverage)](https://codeclimate.com/github/brokeyourbike/enum-validation-laravel/test_coverage)

PHP 8.1 enum validation rules for Laravel

## Installation

```bash
composer require brokeyourbike/enum-validation
```

## Usage

```php
use Illuminate\Foundation\Http\FormRequest;
use BrokeYourBike\EnumValidation\IsValidEnum;

enum DrinkEnum: string {
    case WINE = 'wine';
    case VODKA = 'vodka';
}

class ExampleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'drink' => [
                'required',
                'string',
                new IsValidEnum(DrinkEnum::class),
            ],
        ];
    }
}
```

## Authors
- [Ivan Stasiuk](https://github.com/brokeyourbike) | [Twitter](https://twitter.com/brokeyourbike) | [LinkedIn](https://www.linkedin.com/in/brokeyourbike) | [stasi.uk](https://stasi.uk)

## License
[Mozilla Public License v2.0](https://github.com/brokeyourbike/enum-validation-laravel/blob/main/LICENSE)
