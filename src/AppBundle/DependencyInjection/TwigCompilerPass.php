<?php

namespace AppBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TwigCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if ($container->hasDefinition('twig.loader.filesystem')) {
            $loader = $container->getDefinition('twig.loader.filesystem');

            $path = dirname(__FILE__).'/../Resources/views';
            $loader->addMethodCall('addPath', array($path));
        }
    }
}