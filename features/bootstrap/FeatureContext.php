<?php
declare(strict_types=1);
namespace Workshop\DDD\Cinema\Test;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Workshop\DDD\Cinema\Domain\Command\ReserveSeat;
use Workshop\DDD\Cinema\Domain\Customer;
use Workshop\DDD\Cinema\Domain\ValueObject\Screening;
use Workshop\DDD\Cinema\Domain\ValueObject\Seat;
use Workshop\DDD\Cinema\Infrastructure\CommandHandler;
use Workshop\DDD\Cinema\Domain\Event\Event;
use Workshop\DDD\Cinema\Domain\Event\EventStore;
use Workshop\DDD\Cinema\Domain\Event\ScreeningHasBeenPlanned;
use Workshop\DDD\Cinema\Domain\Event\SeatReserved;
use Workshop\DDD\Cinema\Domain\Aggregates\Screenings;
use Workshop\DDD\Cinema\Domain\Aggregates\ScreeningState;
use Workshop\DDD\Cinema\Infrastructure\InMemoryEventStore;
use function PHPUnit\Framework\assertContains;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

class FeatureContext implements Context
{
    private CommandHandler $commandHandler;
    
    private EventStore $eventStore;
    
    private Customer $customer;
    
    /**
     * @Given /^a Screening with name "([^"]*)"$/
     */
    public function aScreeningWithName(string $name): void
    {
        $this->eventStore = new InMemoryEventStore();
        $this->eventStore->add(new ScreeningHasBeenPlanned(new Screening($name)));
        $this->commandHandler = new CommandHandler($this->eventStore);
    }
    
    /**
     * @Given /^a Customer named "([^"]*)"$/
     */
    public function aCustomerNamed($customerName): void
    {
        $this->customer = new Customer($customerName);
    }
    
    /**
     * @When /^he reserve the Seat "([^"]*)" for Screening "([^"]*)"$/
     */
    public function heReserveTheSeatForScreening(string $seatName, string $screeningName): void
    {
        $command = new ReserveSeat(new Screening($screeningName), new Seat($seatName), $this->customer);
        ($this->commandHandler)($command);
    }
    
    /**
     * @Then /^the Seat "([^"]*)" for Screening "([^"]*)" is reserved$/
     */
    public function theSeatForScreeningIsReserved(string $seatId, $screeningName): void
    {
        $eventStore = $this->eventStore;
        $screeningState = new ScreeningState($eventStore->get());
        
        $publish = static function (Event $e) use ($screeningState, $eventStore) {
            $eventStore->add($e);
            $screeningState->apply($e);
        };
    
        $screenings = new Screenings($screeningState, $publish);
        $seats = $screenings->getReservedSeats($screeningName);
    
        assertTrue(isset($seats[$seatId]));
    }
}
