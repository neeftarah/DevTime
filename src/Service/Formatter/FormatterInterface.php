<?php

namespace App\Service\Formatter;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * Format a number into something readable.
 */
#[AutoconfigureTag('app.formatter')]
interface FormatterInterface
{
    public function supports(string $type): bool;

    public function format(int $number): string;
}
