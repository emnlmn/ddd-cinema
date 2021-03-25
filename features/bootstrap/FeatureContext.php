<?php
declare(strict_types=1);
namespace Workshop\DDD\Cinema\Test;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Workshop\DDD\Cinema\Customer;
use Workshop\DDD\Cinema\Movie;
use Workshop\DDD\Cinema\MovieTitle;
use Workshop\DDD\Cinema\ReservationHandler;
use Workshop\DDD\Cinema\ReserveSeat;
use Workshop\DDD\Cinema\Screening;
use Workshop\DDD\Cinema\ScreeningDateTime;

class FeatureContext implements Context
{
    private Customer $customer;
    private Screening $screening;
    private bool $result;

    public function __construct()
    {
    }

    /**
     * @Given a Customer
     */
    public function aCustomer()
    {
        $this->customer = Customer::create();
    }

    /**
     * @Given A Screening
     */
    public function aScreening()
    {
        $this->screening = Screening::create(
            Movie::create(MovieTitle::create('Fight Club')),
            ScreeningDateTime::of(new \DateTimeImmutable('2020-03-26 21:00'))
        );
    }

    /**
     * @When The Customer reserve a Seat
     */
    public function theCustomerReserveASeat()
    {
        $command = new ReserveSeat($this->customer->id(), $this->screening->id());
        $handler = new ReservationHandler();
        $this->result = $handler($command);
        
    }

    /**
     * @Then The Seat is reserved
     */
    public function theSeatIsReserved()
    {
        throw new PendingException();
    }
}
