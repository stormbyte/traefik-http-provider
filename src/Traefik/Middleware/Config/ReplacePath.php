<?php

namespace Traefik\Middleware\Config;

class ReplacePath implements MiddlewareInterface{

    protected string $path;

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\ReplacePath::class;
    }

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
