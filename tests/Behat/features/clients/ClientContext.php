<?php

namespace App\Tests\Behat\features\clients;

use Behat\Behat\Context\Context;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\HttpKernel\KernelInterface;

class ClientContext implements Context
{
    private KernelBrowser $client;

    public function __construct(KernelInterface $kernel)
    {
        $this->client = new KernelBrowser($kernel);
    }

    /** @Given I send a :method request to :path */
    public function iSendARequestTo(string $method, string $path): void
    {
        $this->client->request($method, $path);
    }

    /** @Given I send a :method request to :path with body: */
    public function iSendARequestToWithBody(string $method, string $path, string $body): void
    {
        try {
            $this->client->request(
                method: $method,
                uri: $path,
                server: [
                    'HTTP_ACCEPT' => 'application/ld+json',
                    'CONTENT_TYPE' => 'PATCH' === $method ? 'application/merge-patch+json' : 'application/ld+json',
                ],
                content: $body,
            );
        } catch (\Throwable $e) {
            throw new \RuntimeException('HTTP request failed: ' . $e->getMessage());
        }
    }

    /** @Then the response status code should be :code */
    public function theResponseStatusCodeShouldBe(int $code): void
    {
        if ($this->client->getResponse()->getStatusCode() !== $code) {
            throw new \RuntimeException(
                'Bad status code: ' . $this->client->getResponse()->getStatusCode()
                . PHP_EOL . $this->client->getResponse()->getContent()
            );
        }
    }

    /** @Then the JSON should have a :key array with :number elements */
    public function theJsonShouldHaveAArray(string $key, int $number): void
    {
        $data = json_decode($this->client->getResponse()->getContent(), true);
        if (!isset($data[$key]) || !is_array($data[$key])) {
            throw new \RuntimeException(
                "Key '$key' is missing or not an array"
            );
        }

        if (sizeof($data[$key]) !== $number) {
            throw new \RuntimeException(
                "The number of expected elements should be '$number' but there are currently "
                . sizeof($data[$key]) . " elements."
            );
        }
    }

    /**
     * @Given the JSON should have a :key property
     */
    public function theJSONShouldHaveAProperty(string $key): void
    {
        $data = json_decode($this->client->getResponse()->getContent(), true);
        if (!isset($data[$key])) {
            throw new \RuntimeException(
                "Key '$key' is missing from JSON"
            );
        }
    }

    /**
     * @Given the JSON should have a :key property equals to :value
     */
    public function theJSONShouldHaveAPropertyWithValue(string $key, string $value): void
    {
        $data = json_decode($this->client->getResponse()->getContent(), true);
        if (!isset($data[$key]) || $value !== $data[$key]) {
            throw new \RuntimeException(
                "Key '$key' is missing from JSON or the value '" . $data[$key]
                . "' is different from the expected value ('$value')"
            );
        }
    }
}
