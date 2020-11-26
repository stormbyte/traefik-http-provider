<?php

namespace Traefik\Middleware;

interface MiddlewareInterface
{
    public function getName(): string;
    public function getData(): array;
}
/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/overview/
 *
 * [Middleware]         [Purpose]                                           [Area]
 *
 ** AddPrefix            Add a Path Prefix                                   Path Modifier
 ** BasicAuth            Basic auth mechanism                                Security, Authentication
 ** Buffering            Buffers the request/response                        Request Lifecycle
 ** Chain                Combine multiple pieces of middleware               Middleware tool
 ** CircuitBreaker       Stop calling unhealthy services                     Request Lifecycle
 ** Compress             Compress the response                               Content Modifier
 ** DigestAuth           Adds Digest Authentication                          Security, Authentication
 ** Errors               Define custom error pages                           Request Lifecycle
 ** ForwardAuth          Authentication delegation                           Security, Authentication
 ** Headers              Add / Update headers                                Security
 ** IPWhiteList          Limit the allowed client IPs                        Security, Request lifecycle
 ** InFlightReq          Limit the number of simultaneous connections        Security, Request lifecycle
 ** PassTLSClientCert    Adding Client Certificates in a Header              Security
 ** RateLimit            Limit the call frequency                            Security, Request lifecycle
 ** RedirectScheme       Redirect easily the client elsewhere                Request lifecycle
 ** RedirectRegex        Redirect the client elsewhere                       Request lifecycle
 ** ReplacePath          Change the path of the request                      Path Modifier
 ** ReplacePathRegex     Change the path of the request                      Path Modifier
 ** Retry                Automatically retry the request in case of errors   Request lifecycle
 ** StripPrefix          Change the path of the request                      Path Modifier
 ** StripPrefixRegex     Change the path of the request                      Path Modifier
 */
