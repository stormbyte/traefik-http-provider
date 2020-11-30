<?php

namespace Traefik\Tcp;

class Server
{
    public string $address;

    public function __construct( string $address )
    {
        $this->address = $address;
    }
}
/*
[http.services]
[http.services.Service01]
  [http.services.Service01.loadBalancer]
    passHostHeader = true
    [http.services.Service01.loadBalancer.sticky]
      [http.services.Service01.loadBalancer.sticky.cookie]
        name = "foobar"
        secure = true
        httpOnly = true
        sameSite = "foobar"

    [[http.services.Service01.loadBalancer.servers]]
      url = "foobar"

    [[http.services.Service01.loadBalancer.servers]]
      url = "foobar"
    [http.services.Service01.loadBalancer.healthCheck]
      scheme = "foobar"
      path = "foobar"
      port = 42
      interval = "foobar"
      timeout = "foobar"
      hostname = "foobar"
      followRedirects = true
      [http.services.Service01.loadBalancer.healthCheck.headers]
        name0 = "foobar"
        name1 = "foobar"
    [http.services.Service01.loadBalancer.responseForwarding]
      flushInterval = "foobar"
[http.services.Service02]
  [http.services.Service02.mirroring]
    service = "foobar"
    maxBodySize = 42

    [[http.services.Service02.mirroring.mirrors]]
      name = "foobar"
      percent = 42

    [[http.services.Service02.mirroring.mirrors]]
      name = "foobar"
      percent = 42
[http.services.Service03]
  [http.services.Service03.weighted]

    [[http.services.Service03.weighted.services]]
      name = "foobar"
      weight = 42

    [[http.services.Service03.weighted.services]]
      name = "foobar"
      weight = 42
    [http.services.Service03.weighted.sticky]
      [http.services.Service03.weighted.sticky.cookie]
        name = "foobar"
        secure = true
        httpOnly = true
        sameSite = "foobar"
*/
