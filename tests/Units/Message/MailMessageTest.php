<?php

namespace App\Tests\Units\Message;

use App\Message\MailMessage;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class MailMessageTest extends TestCase
{
    /**
     * Test the MailMessage constructor and getters.
     */
    #[TestDox('The MailMessage can be created and its properties can be retrieved')]
    public function testMailMessageCreateGet(): void
    {
        $message = new MailMessage('email', 'title', 'content');
        $this->assertSame('email', $message->getEmail());
        $this->assertSame('title', $message->getTitle());
        $this->assertSame('content', $message->getContent());
    }
}
