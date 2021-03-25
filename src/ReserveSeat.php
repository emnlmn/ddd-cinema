<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema;

use Ramsey\Uuid\UuidInterface;

class ReserveSeat
{
    private UuidInterface $customerId;
    private UuidInterface $screeningId;

    public function __construct(UuidInterface $customerId, UuidInterface $screeningId)
    {
        $this->customerId = $customerId;
        $this->screeningId = $screeningId;
    }

    public function customerId(): UuidInterface
    {
        return $this->customerId;
    }

    public function screeningId(): UuidInterface
    {
        return $this->screeningId;
    }
}