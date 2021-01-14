<?php

namespace Traefik\Middleware;

interface MiddlewareInterface {
    public function getName(): string;

    public function getData(): array;
}
