<?php

namespace Traefik\Middleware\Config;

class RateLimit implements MiddlewareInterface{
    protected int $average;
    protected string $period;
    protected int $burst;
    protected SourceCriterion $sourceCriterion;

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\RateLimit::class;
    }

    public function getAverage(): ?int {
        return $this->average ?? null;
    }

    public function setAverage(int $average): self {
        $this->average = $average;
        return $this;
    }

    public function getPeriod(): ?string {
        return $this->period ?? null;
    }

    public function setPeriod(string $period): self {
        $this->period = $period;
        return $this;
    }

    public function getBurst(): ?int {
        return $this->burst ?? null;
    }

    public function setBurst(int $burst): self {
        $this->burst = $burst;
        return $this;
    }

    public function getSourceCriterion(): ?SourceCriterion {
        return $this->sourceCriterion ?? null;
    }

    public function setSourceCriterion(SourceCriterion $sourceCriterion): self {
        $this->sourceCriterion = $sourceCriterion;
        return $this;
    }
}
