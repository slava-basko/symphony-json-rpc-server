<?php
/**
 * Created by basko.slava@gmail.com
 */

namespace JsonRpcServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ServerController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function processAction(Request $request)
    {
        $rpcServer = $this->get('rpc_server');
        if ($request->isMethod('get')) {
            return new JsonResponse($rpcServer->getServiceMap()->toArray());
        }
        return new JsonResponse($rpcServer->handle()->toJson(), 200, [], true);
    }
}