<?php

namespace J3tel\QueryBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class J3telCoreExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('j3tel_core', $config);
        
        $container->setParameter('j3tel_core.controller', $config['controller']);
        $container->setParameter('j3tel_core.controller.exception_handler', $config['controller']['exception_handler']);
        $container->setParameter('j3tel_core.controller.logger_channel', $config['controller']['logger_channel']);
        
        $container->setParameter('j3tel_core.event', $config['event']);
        $container->setParameter('j3tel_core.event.prefix', $config['event']['prefix']);
        
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
