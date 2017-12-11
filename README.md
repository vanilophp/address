# Address Module

This is the address module for [Vanilo](https://vanilo.io).

[![Travis](https://img.shields.io/travis/vanilophp/address.svg?style=flat-square)](https://travis-ci.org/vanilophp/address)
[![Packagist version](https://img.shields.io/packagist/v/vanilo/address.svg?style=flat-square)](https://packagist.org/packages/vanilo/address)
[![Packagist downloads](https://img.shields.io/packagist/dt/vanilo/address.svg?style=flat-square)](https://packagist.org/packages/vanilo/address)
[![MIT Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE.md)

> **This module shouldn't be used standalone.*
>
> It merely binds [Konekt Address](https://github.com/artkonekt/address) with
> the Vanilo (Address) Contract

## Extending

You need to re-register the root `Konekt\Address\Contracts\Address` contract:

```php
// app/AppServiceProvider.php:

    public function boot()
    {
    	$this->app->concord->registerModel(
        	\Konekt\Address\Contracts\Address::class,
        	\App\Address::class
        );
    }
```

```php
// app/Address.php
class Address extends \Vanilo\Address\Models\Address
{
	// Tweak the hell out of it
}
```
