<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class Screening
{
    private Movie $movie;
    private ScreeningDateTime $scheduledDateTime;
    private UuidInterface $id;

    private function __construct(UuidInterface $id, Movie $movie, ScreeningDateTime $scheduledDateTime)
    {
        $this->movie = $movie;
        $this->scheduledDateTime = $scheduledDateTime;
        $this->id = $id;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    public function getScheduledDateTime(): ScreeningDateTime
    {
        return $this->scheduledDateTime;
    }

    public static function create(Movie $movie, ScreeningDateTime $scheduledDateTime): self
    {
        return new self(Uuid::uuid4(), $movie, $scheduledDateTime);
    }
}