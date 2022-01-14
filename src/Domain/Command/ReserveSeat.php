<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain\Command;

use Ramsey\Uuid\UuidInterface;
use Workshop\DDD\Cinema\Domain\Customer;
use Workshop\DDD\Cinema\Domain\ValueObject\Screening;
use Workshop\DDD\Cinema\Domain\ValueObject\Seat;

class ReserveSeat extends Command
{
    private Screening $screening;
    private Seat $seat;
    private Customer $customer;
    
    public function __construct(Screening $screening, Seat $seat, Customer $customer)
    {
        $this->screening = $screening;
        $this->seat = $seat;
        $this->customer = $customer;
    }
    
    public function getScreening(): Screening
    {
        return $this->screening;
    }
    
    public function getSeat(): Seat
    {
        return $this->seat;
    }
    
    public function getCustomer(): Customer
    {
        return $this->customer;
    }
}
