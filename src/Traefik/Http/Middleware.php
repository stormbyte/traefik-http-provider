<?php

namespace Traefik\Http;

use Traefik\ConfigObject;
use Traefik\Transport\HttpTrait;
use Traefik\Type\MiddlewareTrait;
use Traefik\Middleware\MiddlewareInterface;

class Middleware implements ConfigObject
{
    use HttpTrait;
    use MiddlewareTrait;

    protected string $name;
    protected MiddlewareInterface $middleware;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setMiddleware(MiddlewareInterface $middleware)
    {
        $this->middleware = $middleware;
        return $this;
    }

    public function getData(): array
    {
        $data = $this->middleware->getData();

        if (empty($data)) {
            $data = (new \stdClass());
        }

        return [
            $this->middleware->getName() => $data
        ];
    }
}
