<p align="center">
	<img height="60px" width="60px" src="https://plugins.vdlp.nl/octobercms/icons/Vdlp.Hashids.svg">
	<h1 align="center">Vdlp.Hashids</h1>
</p>

<p align="center">
	<em>Allows developers to use secure hashed ID's.</em>
</p>

<p align="center">
	<img src="https://badgen.net/packagist/php/vdlp/oc-hashids-plugin">
	<img src="https://badgen.net/packagist/license/vdlp/oc-hashids-plugin">
	<img src="https://badgen.net/packagist/v/vdlp/oc-hashids-plugin/latest">
	<img src="https://badgen.net/badge/cms/October%20CMS">
	<img src="https://badgen.net/badge/type/plugin">
	<img src="https://plugins.vdlp.nl/octobercms/badge/installations.php?plugin=vdlp-hashids">
</p>

Fetches RSS/Atom feeds to put on your website. It can be automated using a cronjob or triggered manually.

It converts numbers like 347 into strings like "yr8", or array of numbers like [27, 986] into "3kTMd".

You can also decode those ids back. This is useful in bundling several parameters into one or simply using them as short UIDs.

## Requirements

* PHP 7.2 or higher
* October CMS build 468 or higher

## Installation

*CLI:*

```
php artisan plugin:install Vdlp.Hashids
```

*October CMS:*

Go to Settings > Updates & Plugins > Install plugins and search for 'Hashids'.

## Configuration

To configure this plugin execute the following command:

```
php artisan vendor:publish --provider="Vdlp\Hashids\ServiceProvider" --tag="config"
```

This will create a `config/hashids.php` file in your app where you can modify the configuration.

## Example

Here you can see an example of how to use this plugin. Out of the box, the default configuration used is `main`.

```
// You can use this class with Dependency Injection
use Vdlp\Hashids\Classes\HashidsManager;

/** @var HashidsManager $hashids */
$hashidsManager = resolve(HashidsManager::class);

// Encodes the integer 1 to a hashid using the default configuration
$hashidsManager->encode(1);
$hashidsManager->instance()->encode(1);

// Encodes the integer 1 to a hashid using a different configuration
$hashidsManager->instance('different-configuration')->encode(1);
```

## Questions? Need help?

If you have any question about how to use this plugin, please don't hesitate to contact us at octobercms@vdlp.nl. We're happy to help you. You can also visit the support forum and drop your questions/issues there.
