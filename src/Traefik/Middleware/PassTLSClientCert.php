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

        if( !is_null( $config->getPem() ) ) {
            $this->middlewareData['pem'] = $config->getPem();
        }
        if( !is_null( $config->getInfoNotAfter() ) ) {
            $this->middlewareData['info']['notAfter'] = $config->getInfoNotAfter();
        }
        if( !is_null( $config->getInfoNotBefore() ) ) {
            $this->middlewareData['info']['notBefore'] = $config->getInfoNotBefore();
        }
        if( !is_null( $config->getInfoSans() ) ) {
            $this->middlewareData['info']['sans'] = $config->getInfoSans();
        }
        if( !is_null( $config->getInfoSerialNumber() ) ) {
            $this->middlewareData['info']['serialNumber'] = $config->getInfoSans();
        }

        if( $infoSubject = $config->getInfoSubject() ) {
            $this->middlewareData['info']['subject'] = $infoSubject->getData();
        }
        if( $infoIssuer = $config->getInfoIssuer() ) {
            $this->middlewareData['info']['issuer'] = $infoIssuer->getData();
        }

    }
}
