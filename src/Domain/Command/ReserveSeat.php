<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain\Command;

use Ramsey\Uuid\UuidInterface;

class ReserveSeat extends Command
{
    private int $customerId;
    private int $screeningId;

    public function __construct(int $customerId, int $screeningId)
    {
        $this->customerId = $customerId;
        $this->screeningId = $screeningId;
    }

    public function customerId(): int
    {
        return $this->customerId;
    }

    public function screeningId(): int
    {
        return $this->screeningId;
    }
}
