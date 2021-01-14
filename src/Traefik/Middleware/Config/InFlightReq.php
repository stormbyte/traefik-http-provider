<?php

namespace Traefik\Middleware\Config;

use Traefik\Middleware\Config\SourceCriterion;

class InFlightReq implements MiddlewareInterface{
    protected int $amount;
    protected SourceCriterion $sourceCriterion;

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\InFlightReq::class;
    }

    /**
     * @return int|null
     */
    public function getAmount(): ?int {
        return $this->amount ?? null;
    }

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount(int $amount): self {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return \Traefik\Middleware\Config\SourceCriterion|null
     */
    public function getSourceCriterion(): ?SourceCriterion {
        return $this->sourceCriterion ?? null;
    }

    /**
     * @param \Traefik\Middleware\Config\SourceCriterion $sourceCriterion
     * @return $this
     */
    public function setSourceCriterion(SourceCriterion $sourceCriterion): self {
        $this->sourceCriterion = $sourceCriterion;
        return $this;
    }
}
