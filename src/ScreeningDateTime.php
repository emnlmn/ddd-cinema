<?php

declare(strict_types=1);

namespace Workshop\DDD\Cinema;

use DateTimeImmutable;

class ScreeningDateTime
{
    private DateTimeImmutable $date;

    private function __construct(DateTimeImmutable $date)
    {
        $this->date = $date;
    }

    public static function of(DateTimeImmutable $date): self
    {
        return new self($date);
    }

    public function __toString(): string
    {
        return $this->date->format(\DateTimeInterface::RFC3339);
    }
}