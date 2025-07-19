<?php

namespace App\Service\Formatter;

class FormatterManager
{
    private array $formatters = [];

    public function addFormatter(FormatterInterface $formatter): void
    {
        $this->formatters[] = $formatter;
    }

    public function format(string $type, mixed $value): string
    {
        foreach ($this->formatters as $formatter) {
            if ($formatter->supports($type)) {
                return $formatter->format($value);
            }
        }

        throw new \LogicException("No formatter found for type $type");
    }
}
