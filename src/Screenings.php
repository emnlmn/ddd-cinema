<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema;


class Screenings
{

    private array $data = [];

    public function __construct(
    ) {

        $this->data = [
            1 => new Screening(
                1,
                Movie::create(MovieTitle::create('La rivincita dei nerd')),
                ScreeningDateTime::of(new \DateTimeImmutable())
            ),
            1 => new Screening(
                2,
                Movie::create(MovieTitle::create('Profondo Rosso')),
                ScreeningDateTime::of(new \DateTimeImmutable())
            ),
            1 => new Screening(
                3,
                Movie::create(MovieTitle::create('Dune')),
                ScreeningDateTime::of(new \DateTimeImmutable())
            ),
        ];

    }

    public function identifiedBy(int $screeningId): ?Screening
    {
        return $this->data[$screeningId] ?? null;
    }

}
