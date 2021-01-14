<?php

namespace Traefik\Middleware\Config;

class AddPrefix {

    protected string $prefix;

    public function getPrefix(): ?string {
        return $this->prefix ?? null;
    }

    public function setPrefix(string $prefix): self {
        $this->prefix = $prefix;
        return $this;
    }
}
