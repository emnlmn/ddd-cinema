<?php

declare(strict_types=1);

namespace Workshop\DDD\Cinema;

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

    private static function validateDay(int $day)
    {
//        if ($day < 1 && $day > 31) {
//            // ...
//        }
    }

    public static function of(int $day, int $month, int $year): ScheduleDate
    {
        self::validateDay($day);

        return new ScheduleDate($day, $month, $year);
    }
}