<?php

namespace App\Command;

use App\Message\MailMessage;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'app:send-mail',
    description: 'Send an email to someone',
)]
class SendMailCommand extends Command
{
    public function __construct(private readonly MessageBusInterface $messageBus)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Email address of the recipient')
            ->addArgument('title', InputArgument::REQUIRED, 'Title of the email')
            ->addArgument('message', InputArgument::REQUIRED, 'Content of the email')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $this->messageBus->dispatch(new MailMessage(
                $input->getArgument('email'),
                $input->getArgument('title'),
                $input->getArgument('message')
            ));
        } catch (ExceptionInterface $e) {
            $io->error('An error occurred while sending the email: ' . $e->getMessage());

            return Command::FAILURE;
        }

        $io->success('Your email has been sent successfully!');

        return Command::SUCCESS;
    }
}
