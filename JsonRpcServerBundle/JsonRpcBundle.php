<?php
/**
 * Created by basko.slava@gmail.com
 */

namespace JsonRpcServerBundle;

use JsonRpcServerBundle\DependencyInjection\ApiServicesCompiler;
use JsonRpcServerBundle\DependencyInjection\JsonRpcServerExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class JsonRpcBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ApiServicesCompiler());
    }

    /**
     * @return JsonRpcServerExtension
     */
    public function getContainerExtension()
    {
        return new JsonRpcServerExtension();
    }
}
