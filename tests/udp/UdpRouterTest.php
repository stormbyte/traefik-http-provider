<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Traefik\Udp\Router as UdpRouter;

final class UdpRouterTest extends TestCase
{
    const ROUTER_ENTRYPOINT = 'my_router';
    const ROUTER_NAME = 'my_router';
    const ROUTER_RULE = 'HostSNI(`magento.test`)';
    const ROUTER_SERVICE = 'router_service';

    protected $service;

    protected function getService(): UdpRouter
    {
        if (!$this->service) {
            $udpRouter = new UdpRouter();
            $udpRouter->setEntryPoints([self::ROUTER_ENTRYPOINT]);
            $udpRouter->setName(self::ROUTER_NAME);
            $udpRouter->setRule(self::ROUTER_RULE);
            $udpRouter->setService(self::ROUTER_SERVICE);;

            $this->service = $udpRouter;
        }
        return $this->service;
    }

    public function testUdpRouterEntrypoints(): void
    {
        $this->assertContains(
            self::ROUTER_ENTRYPOINT,
            $this->getService()->getEntryPoints()
        );
    }

    public function testUdpRouterName(): void
    {
        $this->assertEquals(
            self::ROUTER_NAME,
            $this->getService()->getName()
        );
    }

    public function testUdpRouterRule(): void
    {
        $data = $this->getService()->getData();

        $this->assertArrayHasKey('rule', $data);
        $this->assertEquals(self::ROUTER_RULE, $data['rule']);
    }

    public function testUdpRouterService(): void
    {
        $data = $this->getService()->getData();

        $this->assertArrayHasKey('service', $data);
        $this->assertEquals(self::ROUTER_SERVICE, $data['service']);
    }

}
