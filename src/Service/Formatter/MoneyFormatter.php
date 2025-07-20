<?php

namespace App\Service\Formatter;

class MoneyFormatter implements FormatterInterface
{
    public function supports(string $type): bool
    {
        return 'money' === $type;
    }

    public function format(int $number): string
    {
        $euros = intdiv($number, 100);
        $cents = $number % 100;

        return trim(sprintf(
            '%s%s',
            $euros ? "{$euros} euro(s) " : '',
            $cents ? "{$cents} cents" : ''
        ));
    }
}
