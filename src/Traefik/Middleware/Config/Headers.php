<?php

namespace Traefik\Middleware\Config;

class Headers implements MiddlewareInterface{

    protected bool $stsIncludeSubdomains;
    protected bool $addVaryHeader;
    protected string $accessControlAllowOrigin;
    protected bool $sslTemporaryRedirect;
    protected bool $contentTypeNosniff;
    protected int $stsSeconds;
    protected bool $sslRedirect;
    protected bool $accessControlAllowCredentials;
    protected string $sslHost;
    protected bool $browserXssFilter;
    protected string $contentSecurityPolicy;
    protected string $referrerPolicy;
    protected bool $sslForceHost;
    protected bool $forceSTSHeader;
    protected string $publicKey;
    protected bool $frameDeny;
    protected bool $isDevelopment;
    protected string $customBrowserXSSValue;
    protected int $accessControlMaxAge;
    protected string $customFrameOptionsValue;
    protected bool $stsPreload;
    protected string $featurePolicy;

    protected array $accessControlAllowOriginList;
    protected array $accessControlAllowMethods;
    protected array $hostsProxyHeaders;
    protected array $accessControlAllowHeaders;
    protected array $allowedHosts;
    protected array $accessControlExposeHeaders;

    protected array $customRequestHeaders;
    protected array $customResponseHeaders;
    protected array $sslProxyHeaders;

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\Headers::class;
    }

    /**
     * @return bool|null
     */
    public function isStsIncludeSubdomains(): ?bool {
        return $this->stsIncludeSubdomains ?? null;
    }

    /**
     * @param bool $stsIncludeSubdomains
     * @return $this
     */
    public function setStsIncludeSubdomains(bool $stsIncludeSubdomains): self {
        $this->stsIncludeSubdomains = $stsIncludeSubdomains;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isAddVaryHeader(): ?bool {
        return $this->addVaryHeader ?? null;
    }

    /**
     * @param bool $addVaryHeader
     * @return $this
     */
    public function setAddVaryHeader(bool $addVaryHeader): self {
        $this->addVaryHeader = $addVaryHeader;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessControlAllowOrigin(): ?string {
        return $this->accessControlAllowOrigin ?? null;
    }

    /**
     * @param string $accessControlAllowOrigin
     * @return $this
     */
    public function setAccessControlAllowOrigin(string $accessControlAllowOrigin): self {
        $this->accessControlAllowOrigin = $accessControlAllowOrigin;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isSslTemporaryRedirect(): ?bool {
        return $this->sslTemporaryRedirect ?? null;
    }

    /**
     * @param bool $sslTemporaryRedirect
     * @return $this
     */
    public function setSslTemporaryRedirect(bool $sslTemporaryRedirect): self {
        $this->sslTemporaryRedirect = $sslTemporaryRedirect;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isContentTypeNosniff(): ?bool {
        return $this->contentTypeNosniff ?? null;
    }

    /**
     * @param bool $contentTypeNosniff
     * @return $this
     */
    public function setContentTypeNosniff(bool $contentTypeNosniff): self {
        $this->contentTypeNosniff = $contentTypeNosniff;
        return $this;
    }

    /**
     * @return int
     */
    public function getStsSeconds(): ?int {
        return $this->stsSeconds ?? null;
    }

    /**
     * @param int $stsSeconds
     * @return $this
     */
    public function setStsSeconds(int $stsSeconds): self {
        $this->stsSeconds = $stsSeconds;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isSslRedirect(): ?bool {
        return $this->sslRedirect ?? null;
    }

    /**
     * @param bool $sslRedirect
     * @return $this
     */
    public function setSslRedirect(bool $sslRedirect): self {
        $this->sslRedirect = $sslRedirect;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isAccessControlAllowCredentials(): ?bool {
        return $this->accessControlAllowCredentials ?? null;
    }

    /**
     * @param bool $accessControlAllowCredentials
     * @return $this
     */
    public function setAccessControlAllowCredentials(bool $accessControlAllowCredentials): self {
        $this->accessControlAllowCredentials = $accessControlAllowCredentials;
        return $this;
    }

    /**
     * @return string
     */
    public function getSslHost(): ?string {
        return $this->sslHost ?? null;
    }

    /**
     * @param string $sslHost
     * @return $this
     */
    public function setSslHost(string $sslHost): self {
        $this->sslHost = $sslHost;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isBrowserXssFilter(): ?bool {
        return $this->browserXssFilter ?? null;
    }

    /**
     * @param bool $browserXssFilter
     * @return $this
     */
    public function setBrowserXssFilter(bool $browserXssFilter): self {
        $this->browserXssFilter = $browserXssFilter;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentSecurityPolicy(): ?string {
        return $this->contentSecurityPolicy ?? null;
    }

    /**
     * @param string $contentSecurityPolicy
     * @return $this
     */
    public function setContentSecurityPolicy(string $contentSecurityPolicy): self {
        $this->contentSecurityPolicy = $contentSecurityPolicy;
        return $this;
    }

    /**
     * @return string
     */
    public function getReferrerPolicy(): ?string {
        return $this->referrerPolicy ?? null;
    }

    /**
     * @param string $referrerPolicy
     * @return $this
     */
    public function setReferrerPolicy(string $referrerPolicy): self {
        $this->referrerPolicy = $referrerPolicy;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isSslForceHost(): ?bool {
        return $this->sslForceHost ?? null;
    }

    /**
     * @param bool $sslForceHost
     * @return $this
     */
    public function setSslForceHost(bool $sslForceHost): self {
        $this->sslForceHost = $sslForceHost;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isForceSTSHeader(): ?bool {
        return $this->forceSTSHeader ?? null;
    }

    /**
     * @param bool $forceSTSHeader
     * @return $this
     */
    public function setForceSTSHeader(bool $forceSTSHeader): self {
        $this->forceSTSHeader = $forceSTSHeader;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublicKey(): ?string {
        return $this->publicKey ?? null;
    }

    /**
     * @param string $publicKey
     * @return $this
     */
    public function setPublicKey(string $publicKey): self {
        $this->publicKey = $publicKey;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isFrameDeny(): ?bool {
        return $this->frameDeny ?? null;
    }

    /**
     * @param bool $frameDeny
     * @return $this
     */
    public function setFrameDeny(bool $frameDeny): self {
        $this->frameDeny = $frameDeny;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isDevelopment(): ?bool {
        return $this->isDevelopment ?? null;
    }

    /**
     * @param bool $isDevelopment
     * @return $this
     */
    public function setIsDevelopment(bool $isDevelopment): self {
        $this->isDevelopment = $isDevelopment;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomBrowserXSSValue(): ?string {
        return $this->customBrowserXSSValue ?? null;
    }

    /**
     * @param string $customBrowserXSSValue
     * @return $this
     */
    public function setCustomBrowserXSSValue(string $customBrowserXSSValue): self {
        $this->customBrowserXSSValue = $customBrowserXSSValue;
        return $this;
    }

    /**
     * @return int
     */
    public function getAccessControlMaxAge(): ?int {
        return $this->accessControlMaxAge ?? null;
    }

    /**
     * @param int $accessControlMaxAge
     * @return $this
     */
    public function setAccessControlMaxAge(int $accessControlMaxAge): self {
        $this->accessControlMaxAge = $accessControlMaxAge;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomFrameOptionsValue(): ?string {
        return $this->customFrameOptionsValue ?? null;
    }

    /**
     * @param string $customFrameOptionsValue
     * @return $this
     */
    public function setCustomFrameOptionsValue(string $customFrameOptionsValue): self {
        $this->customFrameOptionsValue = $customFrameOptionsValue;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isStsPreload(): ?bool {
        return $this->stsPreload ?? null;
    }

    /**
     * @param bool $stsPreload
     * @return $this
     */
    public function setStsPreload(bool $stsPreload): self {
        $this->stsPreload = $stsPreload;
        return $this;
    }

    /**
     * @return string
     */
    public function getFeaturePolicy(): ?string {
        return $this->featurePolicy ?? null;
    }

    /**
     * @param string $featurePolicy
     * @return $this
     */
    public function setFeaturePolicy(string $featurePolicy): self {
        $this->featurePolicy = $featurePolicy;
        return $this;
    }

    /**
     * @return array
     */
    public function getAccessControlAllowOriginList(): ?array {
        return $this->accessControlAllowOriginList ?? null;
    }

    /**
     * @param string $accessControlAllowOriginLis
     * @return $this
     */
    public function addAccessControlAllowOriginList(string $accessControlAllowOriginLis): self {
        $this->accessControlAllowOriginList[] = $accessControlAllowOriginLis;
        return $this;
    }

    /**
     * @return array
     */
    public function getAccessControlAllowMethods(): ?array {
        return $this->accessControlAllowMethods ?? null;
    }

    /**
     * @param string $accessControlAllowMethod
     * @return $this
     */
    public function addAccessControlAllowMethods(string $accessControlAllowMethod): self {
        $this->accessControlAllowMethods[] = $accessControlAllowMethod;
        return $this;
    }

    /**
     * @return array
     */
    public function getHostsProxyHeaders(): ?array {
        return $this->hostsProxyHeaders ?? null;
    }

    /**
     * @param string $hostsProxyHeader
     * @return $this
     */
    public function addHostsProxyHeaders(string $hostsProxyHeader): self {
        $this->hostsProxyHeaders[] = $hostsProxyHeader;
        return $this;
    }

    /**
     * @return array
     */
    public function getAccessControlAllowHeaders(): ?array {
        return $this->accessControlAllowHeaders ?? null;
    }

    /**
     * @param string $accessControlAllowHeader
     * @return $this
     */
    public function addAccessControlAllowHeaders(string $accessControlAllowHeader): self {
        $this->accessControlAllowHeaders[] = $accessControlAllowHeader;
        return $this;
    }

    /**
     * @return array
     */
    public function getAllowedHosts(): ?array {
        return $this->allowedHosts ?? null;
    }

    /**
     * @param string $allowedHost
     * @return $this
     */
    public function addAllowedHosts(string $allowedHost): self {
        $this->allowedHosts[] = $allowedHost;
        return $this;
    }

    /**
     * @return array
     */
    public function getAccessControlExposeHeaders(): ?array {
        return $this->accessControlExposeHeaders ?? null;
    }

    /**
     * @param string $accessControlExposeHeader
     * @return $this
     */
    public function addAccessControlExposeHeaders(string $accessControlExposeHeader): self {
        $this->accessControlExposeHeaders[] = $accessControlExposeHeader;
        return $this;
    }

    /**
     * @return array
     */
    public function getCustomRequestHeaders(): ?array {
        return $this->customRequestHeaders ?? null;
    }

    /**
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function addCustomRequestHeaders(string $key, string $value): self {
        $this->customRequestHeaders[$key] = $value;
        return $this;
    }

    /**
     * @return array
     */
    public function getCustomResponseHeaders(): ?array {
        return $this->customResponseHeaders ?? null;
    }

    /**
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function addCustomResponseHeaders(string $key, string $value): self {
        $this->customResponseHeaders[$key] = $value;
        return $this;
    }

    /**
     * @return array
     */
    public function getSslProxyHeaders(): ?array {
        return $this->sslProxyHeaders ?? null;
    }

    /**
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function addSslProxyHeaders(string $key, string $value): self {
        $this->sslProxyHeaders[$key] = $value;
        return $this;
    }
}
