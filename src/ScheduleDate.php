<?php

declare(strict_types=1);

final class ScheduleDate
{
    private $day;
    private $month;
    private $year;

    private function __construct(int $day, int $month, int $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    private function validateDay(int $day)
    {
        if ($day < 1 && $day > 31) {
            // ...
        }
    }

    public sta«tic function of(int $day, int $month, int $year): ScheduleDate
    {
        $this->validateDay($day);

        return new ScheduleDate($day, $month, $year);
    }
}