<?php

namespace App\Tests\Units\Service\Formatter;

use App\Service\Formatter\DateTimeFormatter;
use PHPUnit\Framework\TestCase;

class DateTimeFormatterTest extends TestCase
{
    public function testFormat(): void
    {
        $formatter = new DateTimeFormatter();

        $this->assertEquals('1 month(s)', $formatter->format(2592000));
        $this->assertEquals('1 month(s) 12 day(s)', $formatter->format(3628800));
        $this->assertEquals('2 month(s) 13 hour(s)', $formatter->format(5230800));
        $this->assertEquals('7 hour(s)', $formatter->format(25200));
        $this->assertEquals('1 day(s) 1 hour(s)', $formatter->format(90000));

        $this->assertEquals('1 month(s) 2 min', $formatter->format(2592120));
        $this->assertEquals('1 month(s) 15 sec', $formatter->format(2592015));
        $this->assertEquals('1 month(s) 3 min 15 sec', $formatter->format(2592195));
        $this->assertEquals('1 day(s) 1 hour(s) 32 sec', $formatter->format(90032));

        $this->assertEquals('1 hour(s)', $formatter->format(3600));
        $this->assertEquals('1 hour(s) 30 min', $formatter->format(5400));
        $this->assertEquals('2 min 10 sec', $formatter->format(130));
        $this->assertEquals('45 sec', $formatter->format(45));
        $this->assertEquals('1 hour(s) 2 sec', $formatter->format(3602));
    }
}
