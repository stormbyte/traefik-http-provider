<?php

namespace Traefik;

use Traefik\Http\Service as HttpService;
use Traefik\Http\Router as HttpRouter;
use Traefik\Http\Middleware as HttpMiddleware;

use Traefik\Tcp\Service as TcpService;
use Traefik\Tcp\Router as TcpRouter;

use Traefik\Udp\Service as UdpService;
use Traefik\Udp\Router as UdpRouter;

use Traefik\Middleware\MiddlewareInterface;
use Traefik\Middleware\Config\MiddlewareInterface as MiddlewareConfigInterface;

class Config {
    protected array $config = [];

    /**
     * @param string $name
     * @param string $url
     * @return HttpService
     */
    public function setHttpService(string $name, string $url): HttpService {
        if (!isset($this->config['HS'][$name])) {
            $this->config['HS'][$name] = (new HttpService())
                ->setName($name)
                ->setType(HttpService::LOADBALANCER)
                ->setPassHostHeader(true)
                ->addServer($url);
        }
        return $this->config['HS'][$name];
    }

    /**
     * @param string $name
     * @param string $rule
     * @param string $serviceName
     * @return HttpRouter
     */
    public function setHttpRouter(string $name, string $rule, string $serviceName): HttpRouter {
        if (!isset($this->config['HR'][$name])) {
            $this->config['HR'][$name] = (new HttpRouter())
                ->setName($name)
                ->setRule($rule)
                ->setService($serviceName);
        }
        return $this->config['HR'][$name];
    }

    /**
     * @param string $name
     * @param MiddlewareConfigInterface $middlewareConfig
     * @return HttpMiddleware
     */
    public function addMiddleWare(string $name, MiddlewareConfigInterface $middlewareConfig): HttpMiddleware
    {
        if (isset($this->config['MW'][$name])) {
            throw new
        }
        $middlewareClass = $middlewareConfig->getMiddlewareClassName();
        $middleware = (new $middlewareClass( $middlewareConfig ));
        return $this->setMiddleWare($name, $middleware);
    }

    /**
     * @param string $name
     * @param MiddlewareInterface $middleware
     * @return HttpMiddleware
     */
    public function setMiddleWare(string $name, MiddlewareInterface $middleware): HttpMiddleware {
        if (!isset($this->config['MW'][$name])) {
            $this->config['MW'][$name] = (new HttpMiddleware())
                ->setName($name)
                ->setMiddleware($middleware);
        }
        return $this->config['MW'][$name];
    }

    /**
     * @param string $name
     * @param string $url
     * @return TcpService
     */
    public function setTcpService(string $name, string $url): TcpService {
        if (!isset($this->config['TS'][$name])) {
            $this->config['TS'][$name] = (new TcpService())
                ->setName($name)
                ->setType(TcpService::LOADBALANCER)
                ->addServer($url);
        }
        return $this->config['TS'][$name];
    }

    /**
     * @param string $name
     * @param string $rule
     * @param string $serviceName
     * @return TcpRouter
     */
    public function setTcpRouter(string $name, string $rule, string $serviceName): TcpRouter {
        if (!isset($this->config['TR'][$name])) {
            $this->config['TR'][$name] = (new TcpRouter())
                ->setName($name)
                ->setRule($rule)
                ->setService($serviceName);
        }
        return $this->config['TR'][$name];
    }

    /**
     * @param string $name
     * @param string $url
     * @return UdpService
     */
    public function setUdpService(string $name, string $url): UdpService {
        if (!isset($this->config['US'][$name])) {
            $this->config['US'][$name] = (new UdpService())
                ->setName($name)
                ->setType(TcpService::LOADBALANCER)
                ->addServer($url);
        }
        return $this->config['US'][$name];
    }

    /**
     * @param string $name
     * @param string $rule
     * @param string $serviceName
     * @return UdpRouter
     */
    public function setUdpRouter(string $name, string $rule, string $serviceName): UdpRouter {
        if (!isset($this->config['UR'][$name])) {
            $this->config['UR'][$name] = (new UdpRouter())
                ->setName($name)
                ->setRule($rule)
                ->setService($serviceName);
        }
        return $this->config['UR'][$name];
    }

    /**
     * @return string
     */
    public function getJsonConfig(): string {
        $result = [];

        foreach ($this->config as $configType) {
            /**
             * @var $config ConfigObject
             */
            foreach ($configType as $config) {
                if (!$config instanceof ConfigObject) {
                    var_dump($config);
                    exit;
                }
                $transport = $config->getTraefikTransport();
                $classType = $config->getTraefikType();
                $name = $config->getName();
                $data = $config->getData();

                if (!isset($result[$transport])) {
                    $result[$transport] = [];
                }
                if (!isset($result[$transport][$classType])) {
                    $result[$transport][$classType] = [];
                }
                if (!isset($result[$transport][$classType][$name])) {
                    $result[$transport][$classType][$name] = [];
                }
                $result[$transport][$classType][$name] = $data;
            }
        }

        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
