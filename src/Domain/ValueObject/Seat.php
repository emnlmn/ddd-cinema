<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain\ValueObject;

class Seat
{
    private string $id;
    
    public function __construct(string $id)
    {
        $this->id = $id;
    }
    
    public function getId(): string
    {
        return $this->id;
    }
    
    public function equals(Seat $other): bool
    {
        return $this->id === $other->getId();
    }
}