<?php

namespace Traefik\Middleware\Config;

class Compress {

    protected array $excludedContentTypes = [];

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
