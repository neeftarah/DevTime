<?php

namespace App\MessageHandler;

use App\Message\MailMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class MailMessageHandler
{
    public function __invoke(MailMessage $message): void
    {
        // ... do some work - like sending an SMS message!
        echo sprintf(
            "Sending email to %s with title \"%s\" and content :\n%s",
            $message->getEmail(),
            $message->getTitle(),
            $message->getContent()
        ) . PHP_EOL . PHP_EOL;
    }
}
