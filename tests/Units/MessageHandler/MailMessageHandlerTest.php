<?php

namespace App\Tests\Units\MessageHandler;

use App\Message\MailMessage;
use App\MessageHandler\MailMessageHandler;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class MailMessageHandlerTest extends TestCase
{
    /**
     * Test the MailMessages are handled correctly
     */
    #[TestDox('MailMessages are handled correctly')]
    public function testMailMessageHandling(): void
    {
        $handler = new MailMessageHandler();
        $message = new MailMessage('test@example.com', 'Sujet', 'Contenu');

        $handler($message);
        $this->expectOutputString(
            "Sending email to test@example.com with title \"Sujet\" and content :\nContenu"
            . PHP_EOL . PHP_EOL
        );
    }
}
