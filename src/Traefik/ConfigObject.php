<?php

namespace Traefik;

interface ConfigObject {
    public function getTraefikTransport(): string;

    public function getTraefikType(): string;

    public function getName(): string;

    public function getData(): array;
}
