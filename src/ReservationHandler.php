<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema;

final class ReservationHandler
{
    private Customers $customers;
    private Screenings $screenings;

    public function __construct(Customers $customers, Screenings $screenings)
    {
        $this->customers = $customers;
        $this->screenings = $screenings;
    }

    public function __invoke(ReserveSeat $command): Reservation
    {
        $customer = $this->customers->identifiedBy($command->customerId());
        $screening = $this->screenings->identifiedBy($command->screeningId());

        $reservation = $screening->reserveASeatFor($customer);
    }
}