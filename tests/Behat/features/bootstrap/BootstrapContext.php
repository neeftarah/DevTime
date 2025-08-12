<?php

namespace App\Tests\Behat\features\bootstrap;

use Behat\Behat\Context\Context;
use RuntimeException;
use Symfony\Component\HttpKernel\KernelInterface;

readonly class BootstrapContext implements Context
{
    public function __construct(
        private KernelInterface $kernel,
    ) {
    }

    /** @BeforeSuite */
    public static function prepareDatabase(): void
    {
        passthru('php bin/console doctrine:database:drop --force --env=test');
        passthru('php bin/console doctrine:database:create --env=test');
        passthru('php bin/console doctrine:migrations:migrate --no-interaction --env=test');
        passthru('php bin/console doctrine:fixtures:load --no-interaction --env=test');
    }

    /**
     * @Then the application's kernel should use :env environment
     */
    public function theApplicationSKernelShouldUseEnvironment(string $env): void
    {
        if ($this->kernel->getEnvironment() !== $env) {
            throw new RuntimeException();
        }
    }
}
