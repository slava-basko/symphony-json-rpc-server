<?php
/**
 * Created by basko.slava@gmail.com
 */

namespace JsonRpcServerBundle\Service\Rpc;

class PingService
{
    /**
     * @return string
     */
    public function ping()
    {
        return 'pong';
    }
}