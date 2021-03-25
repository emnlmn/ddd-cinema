<?php

declare(strict_types=1);

namespace Workshop\DDD\Cinema;

class MovieTitle
{
    private string $title;

    private function __construct(string $title)
    {
        $this->title = $title;
    }

    public static function create(string $title): self
    {
        return new self($title);
    }

    public function value(): string
    {
        return $this->title;
    }
}