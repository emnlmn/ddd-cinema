<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Workshop\DDD\Cinema\Event\Event;
use Workshop\DDD\Cinema\Event\SeatReserved;

final class Screening
{
    private ScreeningState $state;

    public function __construct(ScreeningState $state)
    {
        $this->state = $state;
    }

    public function availableSeat(): int
    {
        return $this->state->seats();
    }

    public function reserveSeat()
    {

    }
}
