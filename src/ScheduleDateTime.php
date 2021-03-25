<?php

declare(strict_types=1);

class ScheduledDateTime
{
    private $date;

    private function __construct(ScheduleDate $date)
    {

        $this->date = $date;
    }

    private function validateDay(int $day)
    {

    }

    public static function of(ScheduleDate $date): ScheduledDate
    {

        return new ScheduledDate($day, $month, $year);
    }
}