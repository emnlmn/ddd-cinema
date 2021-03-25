<?php

declare(strict_types=1);

namespace Workshop\DDD\Cinema;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Customer
{
    private UuidInterface $id;

    private function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public static function create(): self
    {
        return new self(Uuid::uuid4());
    }
}