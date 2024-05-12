<?php

    namespace Designbycode\GoogleMapsPlaceDetails;

    use Designbycode\GoogleMapsPlaceDetails\Enum\Field;

    /**
     * Class Results
     *
     * This class is responsible for handling the results of a Google Maps Place Details API request.
     */
    class Results
    {
        /**
         * @var array $data
         *
         * The raw data returned from the Google Maps Place Details API.
         */
        private array $data;

        /**
         * Constructor
         *
         * Initializes the Results object with the raw data from the API.
         *
         * @param array|null $data The raw data from the API.
         */
        public function __construct(?array $data)
        {
            $this->data = $data;
        }

        /**
         * Get reviews
         *
         * Returns an array of reviews from the API response.
         *
         * @return array
         */
        public function reviews(): array
        {
            // Return the reviews from the API response, or an empty array if not present.
            return $this->data[Field::REVIEWS->value] ?? [];
        }

        /**
         * Get rating
         *
         * Returns the rating from the API response, or null if not present.
         *
         * @return float|null
         */
        public function rating(): ?float
        {
            // Return the rating from the API response, or null if not present.
            return $this->data[Field::RATING->value] ?? null;
        }

        /**
         * Get user ratings total
         *
         * Returns the total number of user ratings from the API response, or null if not present.
         *
         * @return int|null
         */
        public function userRatingsTotal(): ?int
        {
            // Return the total number of user ratings from the API response, or null if not present.
            return $this->data[Field::USER_RATINGS_TOTAL->value] ?? null;
        }
    }
