<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Traefik\Http\Service as HttpService;

final class HttpServiceTest extends TestCase
{
    const SERVICE_NAME = 'test_service';
    const SERVER_URL = 'http://service.test';

    protected $service;

    protected function getService(): HttpService
    {
        if (!$this->service) {
            $httpService = new HttpService();
            $httpService->setName(self::SERVICE_NAME);
            $httpService->setType(HttpService::LOADBALANCER);
            $httpService->setPassHostHeader(true);
            $httpService->addServer(self::SERVER_URL);

            $this->service = $httpService;
        }
        return $this->service;
    }

    public function testHttpServiceName(): void
    {
        $this->assertEquals(
            self::SERVICE_NAME,
            $this->getService()->getName()
        );
    }

    public function testHttpServiceType(): void
    {
        $data = $this->getService()->getData();
        $this->assertArrayHasKey(HttpService::LOADBALANCER, $data);
    }

    public function testHttpServiceUrl(): void
    {
        $data = $this->getService()->getData();

        $this->assertArrayHasKey(HttpService::LOADBALANCER, $data);
        $this->assertArrayHasKey('servers', $data[HttpService::LOADBALANCER]);

        $urlList = [];
        foreach ($data[HttpService::LOADBALANCER]['servers'] as $server) {
            $urlList[] = $server->url;
        }
        $this->assertContains(self::SERVER_URL, $urlList, 'url does not match');
    }

}
