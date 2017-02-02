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