<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Traefik\Tcp\Router as TcpRouter;

final class TcpRouterTest extends TestCase
{
    const ROUTER_ENTRYPOINT = 'my_router';
    const ROUTER_NAME = 'my_router';
    const ROUTER_RULE = 'HostSNI(`magento.test`)';
    const ROUTER_SERVICE = 'router_service';

    protected $service;

    protected function getService(): TcpRouter
    {
        if (!$this->service) {
            $tcpRouter = new TcpRouter();
            $tcpRouter->setEntryPoints([self::ROUTER_ENTRYPOINT]);
            $tcpRouter->setName(self::ROUTER_NAME);
            $tcpRouter->setRule(self::ROUTER_RULE);
            $tcpRouter->setService(self::ROUTER_SERVICE);;

            $this->service = $tcpRouter;
        }
        return $this->service;
    }

    public function testTcpRouterEntrypoints(): void
    {
        $this->assertContains(
            self::ROUTER_ENTRYPOINT,
            $this->getService()->getEntryPoints()
        );
    }

    public function testTcpRouterName(): void
    {
        $this->assertEquals(
            self::ROUTER_NAME,
            $this->getService()->getName()
        );
    }

    public function testTcpRouterRule(): void
    {
        $data = $this->getService()->getData();

        $this->assertArrayHasKey('rule', $data);
        $this->assertEquals(self::ROUTER_RULE, $data['rule']);
    }

    public function testTcpRouterService(): void
    {
        $data = $this->getService()->getData();

        $this->assertArrayHasKey('service', $data);
        $this->assertEquals(self::ROUTER_SERVICE, $data['service']);
    }

}
