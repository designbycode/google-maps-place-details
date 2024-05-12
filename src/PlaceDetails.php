<?php

namespace Designbycode\GoogleMapsPlaceDetails;

use Designbycode\GoogleMapsPlaceDetails\Enum\Field;
use GuzzleHttp\Client;

class PlaceDetails
{
    /**
     * API endpoint URL
     */
    private const API_ENDPOINT = 'https://maps.googleapis.com/maps/api/place/details/json';

    /**
     * Singleton instance of GuzzleHttp\Client
     */
    private static ?Client $client = null;

    /**
     * Google Maps API key
     */
    private string $googleMapsApiKey;

    /**
     * Google Maps place ID
     */
    private string $googleMapsPlaceId;

    /**
     * Cache for response data to avoid multiple API requests
     */
    private ?array $responseData = null;

    public function __construct(string $googleMapsApiKey, string $googleMapsPlaceId)
    {
        $this->googleMapsApiKey = $googleMapsApiKey;
        $this->googleMapsPlaceId = $googleMapsPlaceId;
    }

    /**
     * Returns a singleton instance of GuzzleHttp\Client
     */
    private function HttpClient(): Client
    {
        if (! self::$client) {
            self::$client = new Client();
        }

        return self::$client;
    }

    /**
     * Fetches place details from Google Maps API and caches the response
     */
    private function fetch(): ?array
    {
        if ($this->responseData !== null) {
            return $this->responseData; // return cached data
        }

        $response = $this->HttpClient()->get(self::API_ENDPOINT, [
            'query' => [
                'place_id' => $this->googleMapsPlaceId,
                'key' => $this->googleMapsApiKey,
                'fields' => $this->fields(),
            ],
        ]);

        if ($response->getStatusCode() === 200) {
            $this->responseData = json_decode($response->getBody(), true);

            return $this->responseData;
        }

        return null;
    }

    /**
     * Processes response data to extract a specific field value
     */
    private function processData(string $key): ?float
    {
        return $this->responseData['result'][$key] ?? null;
    }

    /**
     * Returns the full result set from the Google Maps API
     */
    public function getResults(): Results
    {
        $responseData = $this->fetch();

        return new Results($responseData ? $responseData['result'] : null);
    }

    /**
     * Returns reviews for the place
     */
    public function getReviews(): array
    {
        $responseData = $this->fetch();

        return $responseData ? ($responseData['result'][Field::REVIEWS->value] ?? []) : [];
    }

    /**
     * Returns the rating for the place
     */
    public function getRating(): ?float
    {
        $responseData = $this->fetch();

        return $responseData ? $this->processData(Field::RATING->value) : null;
    }

    /**
     * Returns the total user ratings for the place
     */
    public function getUserRatingsTotal(): ?int
    {
        $responseData = $this->fetch();

        return $responseData ? $this->processData(Field::USER_RATINGS_TOTAL->value) : null;
    }

    /**
     * Returns a comma-separated list of fields to request from the API
     */
    private function fields(): string
    {
        return implode(',', array_map(fn (Field $field) => $field->value, Field::cases()));
    }
}
