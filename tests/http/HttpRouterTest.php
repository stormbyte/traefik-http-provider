<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Traefik\Http\Router as HttpRouter;

final class HttpRouterTest extends TestCase
{
    const ROUTER_ENTRYPOINT = 'my_router';
    const ROUTER_NAME = 'my_router';
    const ROUTER_RULE = 'Host(`http://service.test`)';
    const ROUTER_SERVICE = 'router_service';

    protected $service;

    protected function getService(): HttpRouter
    {
        if (!$this->service) {
            $httpRouter = new HttpRouter();
            $httpRouter->setEntryPoints([self::ROUTER_ENTRYPOINT]);
            $httpRouter->setName(self::ROUTER_NAME);
            $httpRouter->setRule(self::ROUTER_RULE);
            $httpRouter->setService(self::ROUTER_SERVICE);;

            $this->service = $httpRouter;
        }
        return $this->service;
    }

    public function testHttpRouterEntrypoints(): void
    {
        $this->assertContains(
            self::ROUTER_ENTRYPOINT,
            $this->getService()->getEntryPoints()
        );
    }

    public function testHttpRouterName(): void
    {
        $this->assertEquals(
            self::ROUTER_NAME,
            $this->getService()->getName()
        );
    }

    public function testHttpRouterRule(): void
    {
        $data = $this->getService()->getData();

        $this->assertArrayHasKey('rule', $data);
        $this->assertEquals(self::ROUTER_RULE, $data['rule']);
    }

    public function testHttpRouterService(): void
    {
        $data = $this->getService()->getData();

        $this->assertArrayHasKey('service', $data);
        $this->assertEquals(self::ROUTER_SERVICE, $data['service']);
    }

}
