<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Workshop\DDD\Cinema\Event\Event;
use Workshop\DDD\Cinema\Event\SeatReserved;

final class Screening
{
    private int $id;
    private int $seats;

    public function __construct(int $id,  int $seats, Events $events)
    {
        $this->id = $id;
        $this->seats = $seats;

        foreach ($events as $event) {
            $this->apply($event);
        }
    }

    public function id(): int
    {
        return $this->id;
    }

    public function getSeats(): int
    {
        return $this->seats;
    }

    public function apply(Event $event) {

        if($event instanceof SeatReserved) {
            $this->seats--;
        }

    }

    public function reserveSeat() {



    }

}
