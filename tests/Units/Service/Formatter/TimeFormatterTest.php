<?php

namespace App\Tests\Units\Service\Formatter;

use App\Service\Formatter\TimeFormatter;
use PHPUnit\Framework\TestCase;

class TimeFormatterTest extends TestCase
{
    public function testFormat(): void
    {
        $formatter = new TimeFormatter();

        $this->assertEquals('1h', $formatter->format(3600));
        $this->assertEquals('1h 30m', $formatter->format(5400));
        $this->assertEquals('2m 10s', $formatter->format(130));
        $this->assertEquals('45s', $formatter->format(45));
        $this->assertEquals('1h 2s', $formatter->format(3602));
    }
}
