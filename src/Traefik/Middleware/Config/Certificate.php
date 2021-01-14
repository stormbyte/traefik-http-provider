<?php

namespace Traefik\Middleware\Config;

class Certificate {

    protected bool $country;
    protected bool $province;
    protected bool $locality;
    protected bool $organization;
    protected bool $commonName;
    protected bool $serialNumber;
    protected bool $domainComponent;

    /**
     * @return bool
     */
    public function isCountry(): ?bool {
        return $this->country ?? null;
    }

    /**
     * @param bool $country
     * @return $this
     */
    public function setCountry(bool $country): self {
        $this->country = $country;
        return $this;
    }

    /**
     * @return bool
     */
    public function isProvince(): ?bool {
        return $this->province ?? null;
    }

    /**
     * @param bool $province
     * @return $this
     */
    public function setProvince(bool $province): self {
        $this->province = $province;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLocality(): ?bool {
        return $this->locality ?? null;
    }

    /**
     * @param bool $locality
     * @return $this
     */
    public function setLocality(bool $locality): self {
        $this->locality = $locality;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOrganization(): ?bool {
        return $this->organization ?? null;
    }

    /**
     * @param bool $organization
     * @return $this
     */
    public function setOrganization(bool $organization): self {
        $this->organization = $organization;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCommonName(): ?bool {
        return $this->commonName ?? null;
    }

    /**
     * @param bool $commonName
     * @return $this
     */
    public function setCommonName(bool $commonName): self {
        $this->commonName = $commonName;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSerialNumber(): ?bool {
        return $this->serialNumber ?? null;
    }

    /**
     * @param bool $serialNumber
     * @return $this
     */
    public function setSerialNumber(bool $serialNumber): self {
        $this->serialNumber = $serialNumber;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDomainComponent(): ?bool {
        return $this->domainComponent ?? null;
    }

    /**
     * @param bool $domainComponent
     * @return $this
     */
    public function setDomainComponent(bool $domainComponent): self {
        $this->domainComponent = $domainComponent;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getData(): ?array {
        $dataArray = [];

        if (!is_null($this->isCountry())) {
            $dataArray['country'] = $this->isCountry();
        }
        if (!is_null($this->isProvince())) {
            $dataArray['province'] = $this->isProvince();
        }
        if (!is_null($this->isLocality())) {
            $dataArray['locality'] = $this->isLocality();
        }
        if (!is_null($this->isOrganization())) {
            $dataArray['organization'] = $this->isOrganization();
        }
        if (!is_null($this->isCommonName())) {
            $dataArray['commonName'] = $this->isCommonName();
        }
        if (!is_null($this->isSerialNumber())) {
            $dataArray['serialNumber'] = $this->isSerialNumber();
        }
        if (!is_null($this->isDomainComponent())) {
            $dataArray['domainComponent'] = $this->isDomainComponent();
        }

        return (!empty($dataArray)) ? $dataArray : null;
    }

}
