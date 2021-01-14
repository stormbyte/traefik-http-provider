<?php

namespace Traefik\Middleware\Config;

class Buffering {
    protected int $maxRequestBodyBytes;
    protected int $memRequestBodyBytes;
    protected int $maxResponseBodyBytes;
    protected int $memResponseBodyBytes;
    protected string $retryExpression;

    /**
     * @return string|null
     */
    public function getRetryExpression(): ?string {
        return $this->retryExpression ?? null;
    }

    /**
     * @param string $retryExpression
     * @return $this
     */
    public function setRetryExpression(string $retryExpression): self {
        $this->retryExpression = $retryExpression;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMemResponseBodyBytes(): ?int {
        return $this->memResponseBodyBytes ?? null;
    }

    /**
     * @param int $memResponseBodyBytes
     * @return $this
     */
    public function setMemResponseBodyBytes(int $memResponseBodyBytes): self {
        $this->memResponseBodyBytes = $memResponseBodyBytes;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxResponseBodyBytes(): ?int {
        return $this->maxResponseBodyBytes ?? null;
    }

    /**
     * @param int $maxResponseBodyBytes
     * @return $this
     */
    public function setMaxResponseBodyBytes(int $maxResponseBodyBytes): self {
        $this->maxResponseBodyBytes = $maxResponseBodyBytes;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMemRequestBodyBytes(): ?int {
        return $this->memRequestBodyBytes ?? null;
    }

    /**
     * @param int $memRequestBodyBytes
     * @return $this
     */
    public function setMemRequestBodyBytes(int $memRequestBodyBytes): self {
        $this->memRequestBodyBytes = $memRequestBodyBytes;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxRequestBodyBytes(): ?int {
        return $this->maxRequestBodyBytes ?? null;
    }

    /**
     * @param int $maxRequestBodyBytes
     * @return $this
     */
    public function setMaxRequestBodyBytes(int $maxRequestBodyBytes): self {
        $this->maxRequestBodyBytes = $maxRequestBodyBytes;
        return $this;
    }

}
