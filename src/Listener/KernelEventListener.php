<?php

namespace App\Listener;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\ControllerArgumentsEvent;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\FinishRequestEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\Event\TerminateEvent;
use Symfony\Component\HttpKernel\Event\ViewEvent;

final readonly class KernelEventListener
{
    public function __construct(
        private LoggerInterface $logger,
        private bool $logKernelEvents,
    ) {
    }

    #[AsEventListener('kernel.request', priority: 100)]
    public function kernelRequest(RequestEvent $event): void
    {
        if ($this->logKernelEvents) {
            $this->logger->info('RequestEvent received', [
                'method' => $event->getRequest()->getMethod(),
                'uri' => $event->getRequest()->getUri(),
            ]);
        }
    }

    #[AsEventListener('kernel.controller', priority: 100)]
    public function kernelController(ControllerEvent $event): void
    {
        if ($this->logKernelEvents) {
            $this->logger->info('ControllerEvent received', [
                'method' => $event->getRequest()->getMethod(),
                'uri' => $event->getRequest()->getUri(),
            ]);
        }
    }

    #[AsEventListener('kernel.controller_arguments', priority: 100)]
    public function kernelControllerArguments(ControllerArgumentsEvent $event): void
    {
        if ($this->logKernelEvents) {
            $this->logger->info('ControllerArgumentsEvent received', [
                'method' => $event->getRequest()->getMethod(),
                'uri' => $event->getRequest()->getUri(),
            ]);
        }
    }

    #[AsEventListener('kernel.view', priority: 100)]
    public function kernelView(ViewEvent $event): void
    {
        if ($this->logKernelEvents) {
            $this->logger->info('ViewEvent received', [
                'method' => $event->getRequest()->getMethod(),
                'uri' => $event->getRequest()->getUri(),
            ]);
        }
    }

    #[AsEventListener('kernel.response', priority: 100)]
    public function kernelResponse(ResponseEvent $event): void
    {
        if ($this->logKernelEvents) {
            $this->logger->info('ResponseEvent received', [
                'method' => $event->getRequest()->getMethod(),
                'uri' => $event->getRequest()->getUri(),
            ]);
        }
    }

    #[AsEventListener('kernel.finish_request', priority: 100)]
    public function kernelFinishRequest(FinishRequestEvent $event): void
    {
        if ($this->logKernelEvents) {
            $this->logger->info('FinishRequestEvent received', [
                'method' => $event->getRequest()->getMethod(),
                'uri' => $event->getRequest()->getUri(),
            ]);
        }
    }

    #[AsEventListener('kernel.terminate', priority: 100)]
    public function kernelTerminate(TerminateEvent $event): void
    {
        if ($this->logKernelEvents) {
            $this->logger->info('TerminateEvent received', [
                'method' => $event->getRequest()->getMethod(),
                'uri' => $event->getRequest()->getUri(),
            ]);
        }
    }

    #[AsEventListener('kernel.exception', priority: 100)]
    public function kernelException(ExceptionEvent $event): void
    {
        if ($this->logKernelEvents) {
            $this->logger->info('ExceptionEvent received', [
                'method' => $event->getRequest()->getMethod(),
                'uri' => $event->getRequest()->getUri(),
            ]);
        }
    }
}
