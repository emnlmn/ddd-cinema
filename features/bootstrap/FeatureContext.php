<?php
declare(strict_types=1);
namespace Workshop\DDD\Cinema\Test;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Workshop\DDD\Cinema\Customer;
use Workshop\DDD\Cinema\Domain\Command\ReserveSeat;
use Workshop\DDD\Cinema\Domain\CommandHandler;
use Workshop\DDD\Cinema\Domain\Event\Event;
use Workshop\DDD\Cinema\Domain\Event\EventStore;
use Workshop\DDD\Cinema\Domain\Event\ScreeningIsReady;
use Workshop\DDD\Cinema\Domain\Event\SeatReserved;
use Workshop\DDD\Cinema\Domain\Screenings;
use Workshop\DDD\Cinema\Domain\ScreeningState;
use Workshop\DDD\Cinema\Infrastructure\InMemoryEventStore;
use function PHPUnit\Framework\assertEquals;

class FeatureContext implements Context
{
    private CommandHandler $commandHandler;
    
    private EventStore $eventStore;

    /**
     * @When The Customer reserve a Seat
     */
    public function theCustomerReserveASeat()
    {
        $command = new ReserveSeat(1, 10);
        ($this->commandHandler)($command);
    }

    /**
     * @Then The Seat is reserved
     */
    public function theSeatIsReserved()
    {
        throw new PendingException();
    }

    /**
     * @Given /^a Screening with (\d+) seats$/
     */
    public function aScreeningWithSeats(int $seats)
    {
        $this->eventStore = new InMemoryEventStore();
        $this->eventStore->add(new ScreeningIsReady($seats));
        $this->commandHandler = new CommandHandler($this->eventStore);
    }

    /**
     * @Then /^The Seats available are (\d+)$/
     */
    public function theSeatsAvailableAre($expectedSeats)
    {
        $eventStore = $this->eventStore;
        $screeningState = new ScreeningState($eventStore->get());
    
        $publish = static function (Event $e) use ($screeningState, $eventStore) {
            $eventStore->add($e);
            $screeningState->apply($e);
        };
    
        $screening = new Screenings($screeningState, $publish);
        assertEquals($expectedSeats, $screening->availableSeat());
    }
}
