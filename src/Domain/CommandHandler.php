<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain;

use Workshop\DDD\Cinema\Domain\Command\Command;
use Workshop\DDD\Cinema\Domain\Command\ReserveSeat;
use Workshop\DDD\Cinema\Domain\Event\Event;
use Workshop\DDD\Cinema\Domain\Event\EventStore;
use Workshop\DDD\Cinema\Domain\Screenings;
use Workshop\DDD\Cinema\Domain\ScreeningState;

class CommandHandler
{
    private EventStore $eventStore;
    
    public function __construct(EventStore $eventStore)
    {
        $this->eventStore = $eventStore;
    }
    
    public function __invoke(Command $command)
    {
        if ($command instanceof ReserveSeat) {
            $this->handleReserveSeat($command, $this->eventStore);
        }
    }
    
    private function handleReserveSeat(ReserveSeat $reserveSeat, EventStore $eventStore): void
    {
        $screeningState = new ScreeningState($eventStore->get());
        
        $publish = static function (Event $e) use ($screeningState, $eventStore) {
            $eventStore->add($e);
            $screeningState->apply($e);
        };
        
        $screening = new Screenings($screeningState, $publish);
        $screening->reserveSeat($reserveSeat);
    }
}