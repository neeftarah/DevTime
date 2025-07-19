<?php

namespace App\DependencyInjection\Compiler;

use App\Service\Formatter\FormatterManager;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class FormatterPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        // always first check if the primary service is defined
        if (!$container->has(FormatterManager::class)) {
            return;
        }

        $definition = $container->findDefinition(FormatterManager::class);

        // find all service IDs with the app.formatter tag
        $taggedServices = $container->findTaggedServiceIds('app.formatter');

        foreach ($taggedServices as $id => $tags) {
            // add the transport service to the TransportChain service
            $definition->addMethodCall('addFormatter', [new Reference($id)]);
        }
    }
}
