<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain\Aggregates;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Workshop\DDD\Cinema\Domain\Command\ReserveSeat;
use Workshop\DDD\Cinema\Domain\Event\Event;
use Workshop\DDD\Cinema\Domain\Event\SeatReserved;
use Workshop\DDD\Cinema\Domain\Aggregates\ScreeningState;
use Workshop\DDD\Cinema\Domain\ValueObject\Seat;

final class Screenings
{
    private ScreeningState $state;
    
    private $publish;

    public function __construct(ScreeningState $state, callable $publish)
    {
        $this->state = $state;
        $this->publish = $publish;
    }
    
    /**
     * @param string $screening
     * @return Seat[]
     */
    public function getReservedSeats(string $screening): array
    {
        return $this->state->getReservedSeats($screening);
    }

    public function reserveSeat(ReserveSeat $reserveSeat): void
    {
        ($this->publish)(new SeatReserved($reserveSeat->getScreening(), $reserveSeat->getSeat(), $reserveSeat->getCustomer()));
    }
}
