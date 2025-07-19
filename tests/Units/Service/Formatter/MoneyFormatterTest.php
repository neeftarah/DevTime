<?php

namespace App\Tests\Units\Service\Formatter;

use App\Service\Formatter\MoneyFormatter;
use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
{
    public function testFormat(): void
    {
        $formatter = new MoneyFormatter();

        $this->assertEquals('18 euro(s)', $formatter->format(1800));
        $this->assertEquals('13 euro(s) 25 cents', $formatter->format(1325));
        $this->assertEquals('36 cents', $formatter->format(36));
        $this->assertEquals('1 cents', $formatter->format(1));
    }
}
