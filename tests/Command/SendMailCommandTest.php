<?php

namespace App\Tests\Command;

use App\Message\MailMessage;
use PHPUnit\Framework\Attributes\TestDox;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\InMemory\InMemoryTransport;

class SendMailCommandTest extends KernelTestCase
{
    #[TestDox('The SendMail command correctly sends an email to AMQP')]
    public function testExecute(): void
    {
        // Get the transport
        /** @var InMemoryTransport $transport *//** @var InMemoryTransport $transport */
        $transport = $this->getContainer()->get('messenger.transport.async');

        // Clear the transport queue before the test
        $transport->reset();

        // Check that the transport is empty before the test
        $this->assertCount(0, $transport->getSent());

        // create the command tester
        $application = new Application(self::$kernel);
        $command = $application->find('app:send-mail');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'email' => 'test@example.com',
            'title' => 'Test',
            'message' => 'Ceci est un test',
        ]);

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('Your email has been sent successfully!', $output);

        // check that the message was sent to the transport
        $this->assertCount(1, $transport->getSent());

        // check that the message is an instance of MailMessage
        /** @var Envelope $envelope */
        $envelope = $transport->getSent()[0];
        $message = $envelope->getMessage();
        $this->assertInstanceOf(MailMessage::class, $message);
    }
}
