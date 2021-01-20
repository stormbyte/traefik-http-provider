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

        if( !is_null( $config->getStsIncludeSubdomains() ) ){
            $this->middlewareData['stsIncludeSubdomains'] = $config->getStsIncludeSubdomains();
        }
        if( !is_null( $config->getAddVaryHeader() ) ){
            $this->middlewareData['addVaryHeader'] = $config->getAddVaryHeader();
        }
        if( !is_null( $config->getSslTemporaryRedirect() ) ){
            $this->middlewareData['sslTemporaryRedirect'] = $config->getSslTemporaryRedirect();
        }
        if( !is_null( $config->getContentTypeNosniff() ) ){
            $this->middlewareData['contentTypeNosniff'] = $config->getContentTypeNosniff();
        }
        if( !is_null( $config->getSslRedirect() ) ){
            $this->middlewareData['sslRedirect'] = $config->getSslRedirect();
        }
        if( !is_null( $config->getAccessControlAllowCredentials() ) ){
            $this->middlewareData['accessControlAllowCredentials'] = $config->getAccessControlAllowCredentials();
        }
        if( !is_null( $config->getBrowserXssFilter() ) ){
            $this->middlewareData['browserXssFilter'] = $config->getBrowserXssFilter();
        }
        if( !is_null( $config->getSslForceHost() ) ){
            $this->middlewareData['sslForceHost'] = $config->getSslForceHost();
        }
        if( !is_null( $config->getForceSTSHeader() ) ){
            $this->middlewareData['forceSTSHeader'] = $config->getForceSTSHeader();
        }
        if( !is_null( $config->getFrameDeny() ) ){
            $this->middlewareData['frameDeny'] = $config->getFrameDeny();
        }
        if( !is_null( $config->getDevelopment() ) ){
            $this->middlewareData['isDevelopment'] = $config->getDevelopment();
        }
        if( !is_null( $config->getStsPreload() ) ){
            $this->middlewareData['stsPreload'] = $config->getStsPreload();
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
