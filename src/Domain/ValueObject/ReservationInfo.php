<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain\ValueObject;

final class ReservationInfo
{
    private array $reservations;
    
    public function __construct(array $reservations)
    {
        $this->reservations = $reservations;
    }
    
    public function equals(ReservationInfo $other): bool
    {
        // i know is bad
        return count($this->getReservations()) === count($other->getReservations());
    }
    
    public function getReservations(): array
    {
        return $this->reservations;
    }
}