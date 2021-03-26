<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema;

class Customers
{

    private array $data = [];

    public function __construct(
    ) {

        $this->data = [
            1 => Customer::create(1),
            2 => Customer::create(2),
            3 => Customer::create(3),
        ];

    }

    public function identifiedBy(int $customerId): ?Customer
    {
        return $this->data[$customerId] ?? null;
    }

}
