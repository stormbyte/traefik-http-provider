<?php

namespace Traefik\Middleware\Config;

class CircuitBreaker {

    protected string $expression;

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
