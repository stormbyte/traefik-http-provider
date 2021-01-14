<?php

namespace Traefik\Middleware\Config;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/retry/
 */
class Retry {

    protected int $attempts;

    /**
     * @return int|null
     */
    public function getAttempts(): ?int {
        return $this->attempts ?? null;
    }

    /**
     * @param int $attempts
     * @return $this
     */
    public function setAttempts(int $attempts): self {
        $this->attempts = $attempts;
        return $this;
    }


}
