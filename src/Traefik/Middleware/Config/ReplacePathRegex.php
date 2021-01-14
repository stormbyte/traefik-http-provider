<?php

namespace Traefik\Middleware\Config;

class ReplacePathRegex implements MiddlewareInterface{

    protected string $regex;
    protected string $replacement;

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\ReplacePathRegex::class;
    }

    /**
     * @return string|null
     */
    public function getRegex(): ?string {
        return $this->regex ?? null;
    }

    /**
     * @param string $regex
     * @return $this
     */
    public function setRegex(string $regex): self {
        $this->regex = $regex;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReplacement(): ?string {
        return $this->replacement ?? null;
    }

    /**
     * @param string $replacement
     * @return $this
     */
    public function setReplacement(string $replacement): self {
        $this->replacement = $replacement;
        return $this;
    }

}
