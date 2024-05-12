# Google Reviews

[![Latest Version on Packagist](https://img.shields.io/packagist/v/designbycode/google-maps-place-details.svg?style=flat-square)](https://packagist.org/packages/designbycode/google-maps-place-details)
[![Tests](https://img.shields.io/github/actions/workflow/status/designbycode/google-maps-place-details/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/designbycode/google-maps-place-details/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/designbycode/google-maps-place-details.svg?style=flat-square)](https://packagist.org/packages/designbycode/google-maps-place-details)

The Reviews class is a part of the Designbycode namespace and is used to fetch reviews, rating, and user ratings total of a place using the Google Places API. It requires a Google Maps API key and a Google Maps place ID to make requests.



## Installation

You can install the package via composer:

```bash
composer require designbycode/google-maps-place-details
```

## Usage
To use the Reviews class, you need to initialize it with a Google Maps API key and a Google Maps place ID. Here's an example:

```php
$reviews = new Designbycode\Reviews\GoogleMapsPlaceDetails('YOUR_GOOGLE_MAPS_API_KEY', 'YOUR_GOOGLE_MAPS_PLACE_ID');

$reviewsArray = $reviews->getReviews();
$rating = $reviews->getRating();
$userRatingsTotal = $reviews->getUserRatingsTotal();
```
Replace `YOUR_GOOGLE_MAPS_API_KEY` and `YOUR_GOOGLE_MAPS_PLACE_ID` with your actual Google Maps API key and place ID. The getReviews, getRating, and getUserRatingsTotal methods return the reviews, rating, and user ratings total of 
the place, respectively.


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/designbycode/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [claudemyburgh](https://github.com/designbycode)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
