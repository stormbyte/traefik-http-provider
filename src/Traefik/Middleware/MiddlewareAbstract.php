<?php

namespace Traefik\Middleware;

use Traefik\ConfigObject;
use Traefik\Transport\HttpTrait;
use Traefik\Type\MiddlewareTrait;

abstract class MiddlewareAbstract implements ConfigObject, MiddlewareInterface
{
    use HttpTrait;
    use MiddlewareTrait;

    protected string $middlewareName;
    protected array $middlewareOptions;
    private array $middlewareData = [];

    public function __construct(array $config)
    {
        foreach ($this->middlewareOptions as $middlewareOption) {
            if (isset($config[$middlewareOption])) {
                $methodName = 'set' . $middlewareOption;
                if (\method_exists($this, \ucfirst($methodName))) {
                    $this->middlewareData[$middlewareOption] = $this->{$methodName}($config[$middlewareOption]);
                } else {
                    $this->middlewareData[$middlewareOption] = $config[$middlewareOption];
                }
            }
        }
    }

    public function getName(): string
    {
        return $this->middlewareName;
    }

    public function getData(): array
    {
        return $this->middlewareData;
    }
}
