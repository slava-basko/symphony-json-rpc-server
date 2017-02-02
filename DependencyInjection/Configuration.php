<?php
/**
 * Created by basko.slava@gmail.com
 */

namespace JsonRpcServerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('json_rpc_server');

        $rootNode
            ->children()
                ->scalarNode('route')->end()
            ->end();

        return $treeBuilder;
    }
}