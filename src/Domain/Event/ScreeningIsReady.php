<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain\Event;

class ScreeningIsReady extends Event
{
    private int $availableSeats;
    
    public function __construct(int $availableSeats)
    {
        $this->availableSeats = $availableSeats;
    }
    
    public function getAvailableSeats(): int
    {
        return $this->availableSeats;
    }
}