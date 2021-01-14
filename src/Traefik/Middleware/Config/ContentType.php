<?php

namespace Traefik\Middleware\Config;

class ContentType {

    protected bool $autoDetect;

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
