<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema;

use Workshop\DDD\Cinema\Event\Event;
use Workshop\DDD\Cinema\Event\SeatReserved;

final class ScreeningState
{
    private int $seats = 10;

    public function __construct(array $events)
    {
        foreach ($events as $event){
            $this->apply($event);
        }
    }

    public function apply(Event $event): void
    {
        if ($event instanceof SeatReserved) {
            $this->seats--;
        }
    }

    public function seats(): int
    {
        return $this->seats;
    }
}