<?php

declare(strict_types=1);

namespace Workshop\DDD\Cinema;

class Movie
{
    private MovieTitle $title;

    private function __construct(MovieTitle $title)
    {
        $this->title = $title;
    }

    public static function create(MovieTitle $title): self
    {
        return new self($title);
    }

    public function title(): MovieTitle
    {
        return $this->title;
    }
}