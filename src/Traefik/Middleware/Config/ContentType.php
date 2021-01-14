<?php

namespace Traefik\Middleware\Config;

class ContentType implements MiddlewareInterface{

    protected bool $autoDetect;

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\ContentType::class;
    }

    /**
     * @return bool|null
     */
    public function isAutoDetect(): ?bool {
        return $this->autoDetect ?? null;
    }

    /**
     * @param bool $autoDetect
     * @return $this
     */
    public function setAutoDetect(bool $autoDetect): self {
        $this->autoDetect = $autoDetect;
        return $this;
    }

}
