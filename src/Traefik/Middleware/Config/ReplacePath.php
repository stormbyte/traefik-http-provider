<?php

namespace Traefik\Middleware\Config;

class ReplacePath {

    protected string $path;

    /**
     * @return string|null
     */
    public function getPath(): ?string {
        return $this->path ?? null;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setPath(string $path): self {
        $this->path = $path;
        return $this;
    }

}
