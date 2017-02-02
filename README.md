Simple JsonRpc Server for Symfony
=================================
Install
-------
Install via composer and add to kernel.
```php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            ...
            new JsonRpcServerBundle\JsonRpcBundle(),
        ];
        return $bundles;
    }
    ...
```
Add this to your routing.yml (or xlm, etc.).
```
json_rpc_server:
    path: /api
    defaults:  { _controller: JsonRpcBundle:Server:process }
```
**Done!**

Usage
-----
Just mark your service with "rpc.service" tag.
```yaml
rpc_ping:
    class: RpcService\PaymentService
    tags:
        - { name: rpc.service }
```

Advanced Configuration
--------------
You can use server as a service. Example:
```php
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @return JsonResponse
     */
    public function indexAction(Request $request)
    {
        // Some Logic. Auth, pre-actions, etc.
    
        $rpcServer = $this->get('rpc_server');
        if ($request->isMethod('get')) {
            return new JsonResponse($rpcServer->getServiceMap()->toArray());
        }
        return new JsonResponse($rpcServer->handle()->toJson(), 200, [], true);
    }
}
```