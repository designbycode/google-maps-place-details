# Google Reviews

[![Latest Version on Packagist](https://img.shields.io/packagist/v/designbycode/google-maps-place-details.svg?style=flat-square)](https://packagist.org/packages/designbycode/google-maps-place-details)
[![Tests](https://img.shields.io/github/actions/workflow/status/designbycode/google-maps-place-details/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/designbycode/google-maps-place-details/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/designbycode/google-maps-place-details.svg?style=flat-square)](https://packagist.org/packages/designbycode/google-maps-place-details)

The Reviews class is a part of the Designbycode namespace and is used to fetch reviews, rating, and user ratings total of a place using the Google Places API. It requires a Google Maps API key and a Google Maps place ID to make requests.

## Package Documentation
This package provides a simple and easy-to-use interface for fetching place details from the Google Maps Place Details API.

> ### Please note the package only return 5 reviews at most.
> ###### If you want to fetch more reviews, please use the [Google Maps Place Search API](https://developers.google.com/maps/documentation/places/web-service/search)


## Installation

To install the package, use composer:

```bash
composer require designbycode/google-maps-place-details
```

## Usage
To use the package, you need to provide a Google Maps API key and a place ID:


```php
use Designbycode\GoogleMapsPlaceDetails\PlaceDetails;

$placeDetails = new PlaceDetails('YOUR_API_KEY', 'YOUR_PLACE_ID');
```
You can then fetch the full result set from the Google Maps API:

```php
$results = $placeDetails->getResults();
```
Or you can fetch specific data, such as reviews, rating, and user ratings total:

```php
$reviews = $placeDetails->getReviews();
$rating = $placeDetails->getRating();
$userRatingTotal = $placeDetails->getUserRatingTotal();
```



## Fields
The package supports the following fields:

- reviews
- rating
- user_ratings_total

```phph
$placeDetails = new PlaceDetails('YOUR_API_KEY', 'YOUR_PLACE_ID');
```


## Results Class
The `Results` class is responsible for handling the results of a Google Maps Place Details API request. It provides the following methods:

- `reviews()`: Returns an array of reviews from the API response.
- `rating()`: Returns the rating from the API response, or null if not present.
- `userRatingsTotal()`: Returns the total number of user ratings from the API response, or null if not present.

### Example 

```php
$placeDetails = new PlaceDetails('YOUR_API_KEY', 'YOUR_PLACE_ID');

$placeDetails->getResults()->reviews();

````


## Enum Class
The Field enum class is used to define the fields that can be fetched from the Google Maps Place Details API. It supports the following fields:

- reviews
- rating
- user_ratings_total


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing
Contributions are welcome! Please submit a pull request with your changes. Please see [CONTRIBUTING](https://github.com/designbycode/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [claudemyburgh](https://github.com/designbycode)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
