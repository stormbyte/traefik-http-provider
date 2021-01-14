<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\PassTLSClientCert as PassTLSClientCertConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/passtlsclientcert/
 */
class PassTLSClientCert extends MiddlewareAbstract {
    protected string $middlewareName = 'passTLSClientCert';

    public function __construct(PassTLSClientCertConfig $config) {

        if( !is_null( $config->isPem() ) ) {
            $this->middlewareData['pem'] = $config->isPem();
        }
        if( !is_null( $config->isInfoNotAfter() ) ) {
            $this->middlewareData['info']['notAfter'] = $config->isInfoNotAfter();
        }
        if( !is_null( $config->isInfoNotBefore() ) ) {
            $this->middlewareData['info']['notBefore'] = $config->isInfoNotBefore();
        }
        if( !is_null( $config->isInfoSans() ) ) {
            $this->middlewareData['info']['sans'] = $config->isInfoSans();
        }
        if( !is_null( $config->isInfoSerialNumber() ) ) {
            $this->middlewareData['info']['serialNumber'] = $config->isInfoSans();
        }

        if( $infoSubject = $config->getInfoSubject() ) {
            $this->middlewareData['info']['subject'] = $infoSubject->getData();
        }
        if( $infoIssuer = $config->getInfoIssuer() ) {
            $this->middlewareData['info']['issuer'] = $infoIssuer->getData();
        }

    }
}
