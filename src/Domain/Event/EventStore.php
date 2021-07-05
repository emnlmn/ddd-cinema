<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain\Event;


interface EventStore
{
    public function add(Event $event): void;
    
    /**
     * @return Event[]
     */
    public function get(): array;
}