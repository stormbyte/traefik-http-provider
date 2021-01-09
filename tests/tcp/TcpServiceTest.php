<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Traefik\Tcp\Service as TcpService;

final class TcpServiceTest extends TestCase
{
    const SERVICE_NAME = 'test_service';
    const SERVER_URL = 'service.test:443';

    protected $service;

    protected function getService(): TcpService
    {
        if (!$this->service) {
            $tcpService = new TcpService();
            $tcpService->setName(self::SERVICE_NAME);
            $tcpService->setType(TcpService::LOADBALANCER);
            $tcpService->addServer(self::SERVER_URL);

            $this->service = $tcpService;
        }
        return $this->service;
    }

    public function testTcpServiceName(): void
    {
        $this->assertEquals(
            self::SERVICE_NAME,
            $this->getService()->getName()
        );
    }

    public function testTcpServiceType(): void
    {
        $data = $this->getService()->getData();
        $this->assertArrayHasKey(TcpService::LOADBALANCER, $data);
    }

    public function testTcpServiceAddress(): void
    {
        $data = $this->getService()->getData();

        $this->assertArrayHasKey(TcpService::LOADBALANCER, $data);
        $this->assertArrayHasKey('servers', $data[TcpService::LOADBALANCER]);

        $urlList = [];
        foreach ($data[TcpService::LOADBALANCER]['servers'] as $server) {
            $this->assertInstanceOf(Traefik\Tcp\Server::class, $server);
            $urlList[] = $server->address;
        }
        $this->assertContains(self::SERVER_URL, $urlList);
    }

}
