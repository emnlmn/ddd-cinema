<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Domain\Event;

use Workshop\DDD\Cinema\Domain\ValueObject\Screening;

class ScreeningHasBeenPlanned extends Event
{
    private Screening $screening;
    
    public function __construct(Screening $screening)
    {
        $this->screening = $screening;
    }
    
    public function getScreening(): Screening
    {
        return $this->screening;
    }
}