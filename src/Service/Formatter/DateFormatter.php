<?php

namespace App\Service\Formatter;

class DateFormatter implements FormatterInterface
{
    public function supports(string $type): bool
    {
        return 'date' === $type;
    }

    public function format(int $number): string
    {
        $months = intdiv($number, 2592000);
        $days = intdiv($number % 2592000, 86400);
        $hours = intdiv($number % 86400, 3600);

        return trim(sprintf(
            '%s%s%s',
            $months ? "{$months} month(s) " : '',
            $days ? "{$days} day(s) " : '',
            $hours ? "{$hours} hour(s)" : ''
        ));
    }
}
