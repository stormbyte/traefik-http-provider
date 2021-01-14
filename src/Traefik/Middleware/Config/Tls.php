<?php

namespace Traefik\Middleware\Config;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/forwardauth/
 */
class Tls {

     protected string $ca;
     protected bool $caOptional;
     protected string $cert;
     protected string $key;
     protected bool $insecureSkipVerify;

    /**
     * @return bool
     */
    public function getInsecureSkipVerify(): bool {
        return $this->insecureSkipVerify;
    }

    /**
     * @param bool $insecureSkipVerify
     * @return $this
     */
    public function setInsecureSkipVerify(bool $insecureSkipVerify): self {
        $this->insecureSkipVerify = $insecureSkipVerify;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string {
        return $this->key;
    }

    /**
     * @param string $key
     * @return $this
     */
    public function setKey(string $key): self {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getCert(): string {
        return $this->cert;
    }

    /**
     * @param string $cert
     * @return $this
     */
    public function setCert(string $cert): self {
        $this->cert = $cert;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCaOptional(): bool {
        return $this->caOptional;
    }

    /**
     * @param bool $caOptional
     * @return $this
     */
    public function setCaOptional(bool $caOptional): self {
        $this->caOptional = $caOptional;
        return $this;
    }

    /**
     * @return string
     */
    public function getCa(): string {
        return $this->ca;
    }

    /**
     * @param string $ca
     * @return $this
     */
    public function setCa(string $ca): self {
        $this->ca = $ca;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getData(): ?array {
        $dataArray = [];

        if ($ca = $this->getCa()) {
            $dataArray['ca'] = $ca;
        }
        if (!is_null($this->getCaOptional())) {
            $dataArray['caOptional'] = $this->getCaOptional();
        }
        if ($cert = $this->getCert()) {
            $dataArray['cert'] = $cert;
        }
        if ($key = $this->getKey()) {
            $dataArray['key'] = $key;
        }
        if (!is_null($this->getInsecureSkipVerify())) {
            $dataArray['insecureSkipVerify'] = $this->getInsecureSkipVerify();
        }

        return (!empty($dataArray)) ? $dataArray : null;
    }

}
