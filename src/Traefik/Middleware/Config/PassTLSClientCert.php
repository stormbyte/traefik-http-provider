<?php

namespace Traefik\Middleware\Config;

class PassTLSClientCert implements MiddlewareInterface{

    protected bool $pem;
    protected bool $infoNotAfter;
    protected bool $infoNotBefore;
    protected bool $infoSans;
    protected bool $serialNumber;
    protected Certificate $infoSubject;
    protected Certificate $infoIssuer;

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\PassTLSClientCert::class;
    }

    /**
     * @return bool
     */
    public function isPem(): ?bool {
        return $this->pem ?? null;
    }

    /**
     * @param bool $pem
     * @return $this
     */
    public function setPem(bool $pem): self {
        $this->pem = $pem;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInfoNotAfter(): ?bool {
        return $this->infoNotAfter ?? null;
    }

    /**
     * @param bool $infoNotAfter
     * @return $this
     */
    public function setInfoNotAfter(bool $infoNotAfter): self {
        $this->infoNotAfter = $infoNotAfter;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInfoNotBefore(): ?bool {
        return $this->infoNotBefore ?? null;
    }

    /**
     * @param bool $infoNotBefore
     * @return $this
     */
    public function setInfoNotBefore(bool $infoNotBefore): self {
        $this->infoNotBefore = $infoNotBefore;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInfoSans(): ?bool {
        return $this->infoSans ?? null;
    }

    /**
     * @param bool $infoSans
     * @return $this
     */
    public function setInfoSans(bool $infoSans): self {
        $this->infoSans = $infoSans;
        return $this;
    }

    /**
     * @return Certificate|null
     */
    public function getInfoSubject(): ?Certificate {
        return $this->infoSubject ?? null;
    }

    /**
     * @param Certificate $infoSubject
     * @return $this
     */
    public function setInfoSubject(Certificate $infoSubject): self {
        $this->infoSubject = $infoSubject;
        return $this;
    }

    /**
     * @return Certificate|null
     */
    public function getInfoIssuer(): ?Certificate {
        return $this->infoIssuer ?? null;
    }

    /**
     * @param Certificate $infoIssuer
     * @return $this
     */
    public function setInfoIssuer(Certificate $infoIssuer): self {
        $this->infoIssuer = $infoIssuer;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInfoSerialNumber(): ?bool {
        return $this->serialNumber ?? null;
    }

    /**
     * @param bool $serialNumber
     * @return $this
     */
    public function setInfoSerialNumber(bool $serialNumber): self {
        $this->serialNumber = $serialNumber;
        return $this;
    }

}
