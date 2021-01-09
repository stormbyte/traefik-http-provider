<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Traefik\Udp\Service as UdpService;

final class UdpServiceTest extends TestCase
{
    const SERVICE_NAME = 'test_service';
    const SERVER_URL = 'service.test:53';

    protected $service;

    protected function getService(): UdpService
    {
        if (!$this->service) {
            $udpService = new UdpService();
            $udpService->setName(self::SERVICE_NAME);
            $udpService->setType(UdpService::LOADBALANCER);
            $udpService->addServer(self::SERVER_URL);

            $this->service = $udpService;
        }
        return $this->service;
    }

    public function testUdpServiceName(): void
    {
        $this->assertEquals(
            self::SERVICE_NAME,
            $this->getService()->getName()
        );
    }

    public function testUdpServiceType(): void
    {
        $data = $this->getService()->getData();
        $this->assertArrayHasKey(UdpService::LOADBALANCER, $data);
    }

    public function testUdpServiceAddress(): void
    {
        $data = $this->getService()->getData();

        $this->assertArrayHasKey(UdpService::LOADBALANCER, $data);
        $this->assertArrayHasKey('servers', $data[UdpService::LOADBALANCER]);

        $urlList = [];
        foreach ($data[UdpService::LOADBALANCER]['servers'] as $server) {
            $this->assertInstanceOf(Traefik\Udp\Server::class, $server);
            $urlList[] = $server->address;
        }
        $this->assertContains(self::SERVER_URL, $urlList);
    }

}
