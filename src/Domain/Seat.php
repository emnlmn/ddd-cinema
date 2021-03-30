<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain;

class Seat
{
    private string $number;
    
    public function __construct(string $number)
    {
        $this->number = $number;
    }
    
    public function getNumber(): string
    {
        return $this->number;
    }
}