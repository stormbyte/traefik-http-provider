<?php

namespace Traefik\Middleware\Config;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/stripprefixregex/
 */
class StripPrefixRegex {

    protected array $regex;

    /**
     * @return array|null
     */
    public function getRegex(): ?array {
        return $this->regex ?? null;
    }

    /**
     * @param string $regex
     * @return $this
     */
    public function addRegex(string $regex): self {
        $this->regex[] = $regex;
        return $this;
    }

}
