<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Workshop\DDD\Cinema\Domain\Command\ReserveSeat;
use Workshop\DDD\Cinema\Domain\Event\Event;
use Workshop\DDD\Cinema\Domain\Event\SeatReserved;
use Workshop\DDD\Cinema\Domain\ScreeningState;

final class Screenings
{
    private ScreeningState $state;
    private $publish;

    public function __construct(ScreeningState $state, callable $publish)
    {
        $this->state = $state;
        $this->publish = $publish;
    }

    public function availableSeat(): int
    {
        return $this->state->seats();
    }

    public function reserveSeat(ReserveSeat $reserveSeat): void
    {
        ($this->publish)(new SeatReserved());
    }
    
    public static function get()
    {
    
    }
}
