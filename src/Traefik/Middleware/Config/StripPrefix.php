<?php

namespace Traefik\Middleware\Config;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/stripprefix/
 */
class StripPrefix {

    protected array $prefixes;
    protected bool $forceSlash;

    /**
     * @return array|null
     */
    public function getPrefixes(): ?array {
        return $this->prefixes ?? null;
    }

    /**
     * @param string $prefix
     * @return $this
     */
    public function addPrefixes(string $prefix): self {
        $this->prefixes[] = $prefix;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isForceSlash(): ?bool {
        return $this->forceSlash ?? null;
    }

    /**
     * @param bool $forceSlash
     * @return $this
     */
    public function setForceSlash(bool $forceSlash): self {
        $this->forceSlash = $forceSlash;
        return $this;
    }

}
