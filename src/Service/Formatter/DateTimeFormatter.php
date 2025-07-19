<?php

namespace App\Service\Formatter;

class DateTimeFormatter implements FormatterInterface
{
    public function supports(string $type): bool
    {
        return 'datetime' === $type;
    }

    public function format(int $number): string
    {
        $months = intdiv($number, 2592000);
        $days = intdiv($number % 2592000, 86400);
        $hours = intdiv($number % 86400, 3600);
        $minutes = intdiv($number % 3600, 60);
        $seconds = $number % 60;

        return trim(sprintf(
            '%s%s%s%s%s',
            $months ? "{$months} month(s) " : '',
            $days ? "{$days} day(s) " : '',
            $hours ? "{$hours} hour(s) " : '',
            $minutes ? "{$minutes} min " : '',
            $seconds ? "{$seconds} sec" : ''
        ));
    }
}
