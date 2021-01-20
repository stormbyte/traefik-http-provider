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
    public function getCountry(): ?bool {
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
    public function getProvince(): ?bool {
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
    public function getLocality(): ?bool {
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
    public function getOrganization(): ?bool {
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
    public function getCommonName(): ?bool {
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
    public function getSerialNumber(): ?bool {
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
    public function getDomainComponent(): ?bool {
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

        if (!is_null($this->getCountry())) {
            $dataArray['country'] = $this->getCountry();
        }
        if (!is_null($this->getProvince())) {
            $dataArray['province'] = $this->getProvince();
        }
        if (!is_null($this->getLocality())) {
            $dataArray['locality'] = $this->getLocality();
        }
        if (!is_null($this->getOrganization())) {
            $dataArray['organization'] = $this->getOrganization();
        }
        if (!is_null($this->getCommonName())) {
            $dataArray['commonName'] = $this->getCommonName();
        }
        if (!is_null($this->getSerialNumber())) {
            $dataArray['serialNumber'] = $this->getSerialNumber();
        }
        if (!is_null($this->getDomainComponent())) {
            $dataArray['domainComponent'] = $this->getDomainComponent();
        }

        return (!empty($dataArray)) ? $dataArray : null;
    }

}
