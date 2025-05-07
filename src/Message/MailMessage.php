<?php

namespace App\Message;

class MailMessage
{
    public function __construct(
        private readonly string $email,
        private readonly string $title,
        private readonly string $content,
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
