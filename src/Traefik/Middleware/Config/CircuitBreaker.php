<?php

namespace Traefik\Middleware\Config;

class CircuitBreaker implements MiddlewareInterface{

    protected string $expression;

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\CircuitBreaker::class;
    }

    /**
     * @return string|null
     */
    public function getExpression(): ?string {
        return $this->expression ?? null;
    }

    /**
     * @param string $expression
     * @return $this
     */
    public function setExpression(string $expression): self {
        $this->expression = $expression;
        return $this;
    }
}
