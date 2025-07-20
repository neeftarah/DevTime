<?php

namespace App\Service\Formatter;

class TimeFormatter implements FormatterInterface
{
    public function supports(string $type): bool
    {
        return 'time' === $type;
    }

    public function format(int $number): string
    {
        $hours = intdiv($number, 3600);
        $minutes = intdiv($number % 3600, 60);
        $seconds = $number % 60;

        return trim(sprintf(
            '%s%s%s',
            $hours ? "{$hours}h " : '',
            $minutes ? "{$minutes}m " : '',
            $seconds ? "{$seconds}s" : ''
        ));
    }
}
