<?php

declare(strict_types=1);

namespace Workshop\DDD\Cinema;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Customer
{
    private int $id;

    private function __construct(int $id)
    {
        $this->id = $id;
    }

    public function id(): int
    {
        return $this->id;
    }

    public static function create(int $id): self
    {
        return new self($id);
    }
}
