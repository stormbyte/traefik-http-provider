<?php

namespace Traefik\Middleware;

use Traefik\ConfigObject;
use Traefik\Transport\HttpTrait;
use Traefik\Type\MiddlewareTrait;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/headers/
 */
class Headers implements ConfigObject, MiddlewareInterface
{
    use HttpTrait;
    use MiddlewareTrait;

    protected array $headers;

    public function __construct(array $headers)
    {
        $this->headers = $headers;
    }

    public function getName(): string
    {
        return 'headers';
    }

    public function getData(): array
    {
        return $this->headers;
    }
}
