<?php

namespace Designbycode\GoogleMapsPlaceDetails;

use Designbycode\GoogleMapsPlaceDetails\Enum\Field;

class Results
{
    private array $data;

    public function __construct(?array $data)
    {
        $this->data = $data;
    }

    public function reviews(): array
    {
        return $this->data[Field::REVIEWS->value] ?? [];
    }

    public function rating(): ?float
    {
        return $this->data[Field::RATING->value] ?? null;
    }

    public function userRatingsTotal(): ?int
    {
        return $this->data[Field::USER_RATINGS_TOTAL->value] ?? null;
    }
}
