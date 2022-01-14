<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain\ValueObject;

class Reservation
{
    private string $screening;
    
    private string $seat;
    
    public function __construct(string $screening, string $seat)
    {
        $this->screening = $screening;
        $this->seat = $seat;
    }
    
    public function getScreening(): string
    {
        return $this->screening;
    }
    
    public function getSeat(): string
    {
        return $this->seat;
    }
    
    public function equal(Reservation $reservation): bool
    {
        return $this->screening === $reservation->getScreening() && $this->seat === $reservation->getSeat();
    }
}