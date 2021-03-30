<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema;


use Workshop\DDD\Cinema\Domain\Screenings;

class Screenings
{

    private array $data = [];

    public function __construct(
    ) {

        $this->data = [
            1 => new Screenings(
                1,
                Movie::create(MovieTitle::create('La rivincita dei nerd')),
                ScreeningDateTime::of(new \DateTimeImmutable())
            ),
            1 => new Screenings(
                2,
                Movie::create(MovieTitle::create('Profondo Rosso')),
                ScreeningDateTime::of(new \DateTimeImmutable())
            ),
            1 => new Screenings(
                3,
                Movie::create(MovieTitle::create('Dune')),
                ScreeningDateTime::of(new \DateTimeImmutable())
            ),
        ];

    }

    public function identifiedBy(int $screeningId): ?Screenings
    {
        return $this->data[$screeningId] ?? null;
    }

}
