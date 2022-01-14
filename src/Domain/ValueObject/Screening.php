<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain\ValueObject;

class Screening
{
    private string $id;
    
    /**
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
    
    public function getId(): string
    {
        return $this->id;
    }
}