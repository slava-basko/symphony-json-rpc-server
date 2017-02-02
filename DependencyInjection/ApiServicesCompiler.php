<?php
/**
 * Created by basko.slava@gmail.com
 */

namespace JsonRpcServerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Zend\Json\Server\Smd;

class ApiServicesCompiler implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $rpcServer = $container->findDefinition('rpc_server');
        $rpcServer->addMethodCall('setEnvelope', [Smd::ENV_JSONRPC_2]);
        $rpcServer->addMethodCall('setReturnResponse', [true]);

        $taggedServices = $container->findTaggedServiceIds('rpc.service');
        foreach ($taggedServices as $id => $apiService) {
            $rpcServer->addMethodCall(
                'setClass',
                [new Reference($id)]
            );
        }
    }
}