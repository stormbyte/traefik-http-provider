<?php

namespace Traefik;

use \Traefik\ConfigObject;

abstract class RouterObject implements ConfigObject {

    protected string $name;
    protected string $rule;
    protected array $entryPoints = [];
    protected bool $tls = false;
    protected int $priority;
    protected array $middlewares;
    protected string $serviceName;

    public function setPriority(int $priority): self {
        $this->priority = $priority;
        return $this;
    }

    public function getPriority(): int {
        return $this->priority;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName($name): self {
        $this->name = $name;
        return $this;
    }

    public function getRule(): ?string {
        return $this->rule ?? null;
    }

    public function setRule($rule): self {
        if (strlen($rule)) {
            $this->rule = $rule;
        }
        return $this;
    }

    public function getService(): string {
        return $this->serviceName;
    }

    public function setService(string $serviceName): self {
        $this->serviceName = $serviceName;
        return $this;
    }

    public function getTls(): bool {
        return $this->tls;
    }

    public function setTls(bool $tls): self {
        $this->tls = $tls;
        return $this;
    }

    public function setEntryPoints(array $entryPoints): self {
        $this->entryPoints = $entryPoints;
        return $this;
    }

    public function getEntryPoints(): array {
        return $this->entryPoints;
    }

    public function setMiddlewares(array $middlewares): self {
        $this->middlewares = $middlewares;
        return $this;
    }
}
