<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Infrastructure;

use Workshop\DDD\Cinema\Domain\Event\Event;
use Workshop\DDD\Cinema\Domain\Event\EventStore;

class InMemoryEventStore implements EventStore
{
    private array $events = [];
    
    public function add(Event $event): void
    {
        $this->events[] = $event;
    }
    
    public function get(): array
    {
        return $this->events;
    }
}