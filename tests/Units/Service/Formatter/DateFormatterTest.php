<?php

namespace App\Tests\Units\Service\Formatter;

use App\Service\Formatter\DateFormatter;
use PHPUnit\Framework\TestCase;

class DateFormatterTest extends TestCase
{
    public function testFormat(): void
    {
        $formatter = new DateFormatter();

        $this->assertEquals('1 month(s)', $formatter->format(2592000));
        $this->assertEquals('1 month(s) 12 day(s)', $formatter->format(3628800));
        $this->assertEquals('2 month(s) 13 hour(s)', $formatter->format(5230800));
        $this->assertEquals('7 hour(s)', $formatter->format(25200));
        $this->assertEquals('1 day(s) 1 hour(s)', $formatter->format(90000));
    }
}
