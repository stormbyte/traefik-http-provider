<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\Headers as HeadersConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/headers/
 */
class Headers extends MiddlewareAbstract {

    protected string $middlewareName = 'headers';


    public function __construct(HeadersConfig $config) {

        if( !is_null( $config->isStsIncludeSubdomains() ) ){
            $this->middlewareData['stsIncludeSubdomains'] = $config->isStsIncludeSubdomains();
        }
        if( !is_null( $config->isAddVaryHeader() ) ){
            $this->middlewareData['addVaryHeader'] = $config->isAddVaryHeader();
        }
        if( !is_null( $config->isSslTemporaryRedirect() ) ){
            $this->middlewareData['sslTemporaryRedirect'] = $config->isSslTemporaryRedirect();
        }
        if( !is_null( $config->isContentTypeNosniff() ) ){
            $this->middlewareData['contentTypeNosniff'] = $config->isContentTypeNosniff();
        }
        if( !is_null( $config->isSslRedirect() ) ){
            $this->middlewareData['sslRedirect'] = $config->isSslRedirect();
        }
        if( !is_null( $config->isAccessControlAllowCredentials() ) ){
            $this->middlewareData['accessControlAllowCredentials'] = $config->isAccessControlAllowCredentials();
        }
        if( !is_null( $config->isBrowserXssFilter() ) ){
            $this->middlewareData['browserXssFilter'] = $config->isBrowserXssFilter();
        }
        if( !is_null( $config->isSslForceHost() ) ){
            $this->middlewareData['sslForceHost'] = $config->isSslForceHost();
        }
        if( !is_null( $config->isForceSTSHeader() ) ){
            $this->middlewareData['forceSTSHeader'] = $config->isForceSTSHeader();
        }
        if( !is_null( $config->isFrameDeny() ) ){
            $this->middlewareData['frameDeny'] = $config->isFrameDeny();
        }
        if( !is_null( $config->isDevelopment() ) ){
            $this->middlewareData['isDevelopment'] = $config->isDevelopment();
        }
        if( !is_null( $config->isStsPreload() ) ){
            $this->middlewareData['stsPreload'] = $config->isStsPreload();
        }

        if( $accessControlAllowOrigin = $config->getAccessControlAllowOrigin() ){
            $this->middlewareData['accessControlAllowOrigin'] = $accessControlAllowOrigin;
        }
        if( $stsSeconds = $config->getStsSeconds() ){
            $this->middlewareData['stsSeconds'] = $stsSeconds;
        }
        if( $sslHost = $config->getSslHost() ){
            $this->middlewareData['sslHost'] = $sslHost;
        }
        if( $contentSecurityPolicy = $config->getContentSecurityPolicy() ){
            $this->middlewareData['contentSecurityPolicy'] = $contentSecurityPolicy;
        }
        if( $referrerPolicy = $config->getReferrerPolicy() ){
            $this->middlewareData['referrerPolicy'] = $referrerPolicy;
        }
        if( $publicKey = $config->getPublicKey() ){
            $this->middlewareData['publicKey'] = $publicKey;
        }
        if( $customBrowserXSSValue = $config->getCustomBrowserXSSValue() ){
            $this->middlewareData['customBrowserXSSValue'] = $customBrowserXSSValue;
        }
        if( $accessControlMaxAge = $config->getAccessControlMaxAge() ){
            $this->middlewareData['accessControlMaxAge'] = $accessControlMaxAge;
        }
        if( $customFrameOptionsValue = $config->getCustomFrameOptionsValue() ){
            $this->middlewareData['customFrameOptionsValue'] = $customFrameOptionsValue;
        }
        if( $featurePolicy = $config->getFeaturePolicy() ){
            $this->middlewareData['featurePolicy'] = $featurePolicy;
        }
        if( $accessControlAllowOriginList = $config->getAccessControlAllowOriginList() ){
            $this->middlewareData['accessControlAllowOriginList'] = $accessControlAllowOriginList;
        }
        if( $accessControlAllowMethods = $config->getAccessControlAllowMethods() ){
            $this->middlewareData['accessControlAllowMethods'] = $accessControlAllowMethods;
        }
        if( $hostsProxyHeaders = $config->getHostsProxyHeaders() ){
            $this->middlewareData['hostsProxyHeaders'] = $hostsProxyHeaders;
        }
        if( $accessControlAllowHeaders = $config->getAccessControlAllowHeaders() ){
            $this->middlewareData['accessControlAllowHeaders'] = $accessControlAllowHeaders;
        }
        if( $allowedHosts = $config->getAllowedHosts() ){
            $this->middlewareData['allowedHosts'] = $allowedHosts;
        }
        if( $accessControlExposeHeaders = $config->getAccessControlExposeHeaders() ){
            $this->middlewareData['accessControlExposeHeaders'] = $accessControlExposeHeaders;
        }
        if( $customRequestHeaders = $config->getCustomRequestHeaders() ){
            $this->middlewareData['customRequestHeaders'] = $customRequestHeaders;
        }
        if( $customResponseHeaders = $config->getCustomResponseHeaders() ){
            $this->middlewareData['customResponseHeaders'] = $customResponseHeaders;
        }
        if( $sslProxyHeaders = $config->getSslProxyHeaders() ){
            $this->middlewareData['sslProxyHeaders'] = $sslProxyHeaders;
        }

    }

}
