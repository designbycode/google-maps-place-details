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
         * @var array
         *
         * The raw data returned from the Google Maps Place Details API.
         */
        private array $data;

        /**
         * Constructor
         *
         * Initializes the Results object with the raw data from the API.
         *
         * @param  array|null  $data  The raw data from the API.
         */
        public function __construct(?array $data)
        {
            $this->data = $data ?? [];
        }

        /**
         * Magic method to allow property-like access to methods.
         *
         * @param string $name The property name.
         * @return mixed
         * @throws \Exception If the property does not exist.
         */
        public function __get(string $name)
        {
            // Attempt to match the property name to a Field enum value
            $field = Field::tryFrom($name);
            // Check if the field is valid and map to the corresponding method
            if ($field !== null) {
                $methodName = lcfirst(implode('', array_map('ucfirst', explode('_', $field->value))));

                // Check if the method exists and call it
                if (method_exists($this, $methodName)) {
                    return $this->$methodName();
                }
            }

            throw new \Exception("Property {$name} does not exist");
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
            return isset($this->data[Field::RATING->value]) ? (float)$this->data[Field::RATING->value] : null;
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
            return isset($this->data[Field::USER_RATINGS_TOTAL->value]) ? (int)$this->data[Field::USER_RATINGS_TOTAL->value] : null;
        }

        /**
         * Check if data is available for a specific field
         *
         * @param Field $field
         * @return bool
         */
        public function hasData(Field $field): bool
        {
            return isset($this->data[$field->value]);
        }

        /**
         * Get data for a specific field
         *
         * @param Field $field
         * @return mixed|null
         */
        public function getFieldData(Field $field): mixed
        {
            return $this->data[$field->value] ?? null;
        }
    }
