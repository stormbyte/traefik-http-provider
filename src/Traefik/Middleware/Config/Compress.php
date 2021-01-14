<?php

namespace Traefik\Middleware\Config;

class Compress implements MiddlewareInterface{

    protected array $excludedContentTypes = [];

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\Compress::class;
    }

    /**
     * @return array|null
     */
    public function getExcludedContentTypes(): ?array {
        return $this->excludedContentTypes ?? null;
    }

    /**
     * @param string $excludedContentType
     * @return $this
     */
    public function addExcludedContentType(string $excludedContentType): self {
        $this->excludedContentTypes[] = $excludedContentType;
        return $this;
    }
}
