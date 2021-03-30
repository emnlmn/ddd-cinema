<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain\Aggregates;

use Workshop\DDD\Cinema\Domain\Event\Event;
use Workshop\DDD\Cinema\Domain\Event\ScreeningHasBeenPlanned;
use Workshop\DDD\Cinema\Domain\Event\SeatReserved;

final class ScreeningState
{
    private int $seats = 10;
    
    /**
     * @param Event[]
     */
    public function __construct(array $events)
    {
        foreach ($events as $event){
            $this->apply($event);
        }
    }

    public function apply(Event $event): void
    {
        if ($event instanceof ScreeningHasBeenPlanned) {
            $this->seats = $event->getAvailableSeats();
        }
        
        if ($event instanceof SeatReserved) {
            $this->seats--;
        }
    }

    public function seats(): int
    {
        return $this->seats;
    }
}