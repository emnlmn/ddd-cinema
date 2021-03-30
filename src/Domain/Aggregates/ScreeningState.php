<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain\Aggregates;

use Workshop\DDD\Cinema\Domain\Event\Event;
use Workshop\DDD\Cinema\Domain\Event\ScreeningHasBeenPlanned;
use Workshop\DDD\Cinema\Domain\Event\SeatReserved;
use Workshop\DDD\Cinema\Domain\ValueObject\Screening;
use Workshop\DDD\Cinema\Domain\ValueObject\Seat;

final class ScreeningState
{
    /**
     * @var array<string, Seat[]>
     */
    private array $screenings = [];
    
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
            $this->screenings[$event->getScreening()->getId()] = [];
        }
        
        if ($event instanceof SeatReserved) {
            $screening = $this->screenings[$event->getScreening()->getId()][$event->getSeat()->getId()] = $event->getSeat();
        }
    }

    public function screenings(): array
    {
        return $this->screenings;
    }
    
    public function getReservedSeats(string $screening): array
    {
        return $this->screenings[$screening];
    }
}