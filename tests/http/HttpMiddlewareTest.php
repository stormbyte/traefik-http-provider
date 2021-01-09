<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class HttpMiddlewareTest extends TestCase
{

    // - `\Traefik\Middleware\Addprefix`
    public function testAddprefix(): void
    {
        $name = 'addPrefix';
        $options = ['prefix' => '/foo'];
        $middleware = new \Traefik\Middleware\Addprefix($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertArrayHasKey('prefix', $data);
        $this->assertEquals($options['prefix'], $data['prefix']);
    }

    // - `\Traefik\Middleware\Basicauth`
    public function testBasicauth(): void
    {
        $userTest = 'test:' . \Traefik\Middleware\Basicauth::bcrypt('test');
        $userTest2 = 'test2:' . \Traefik\Middleware\Basicauth::bcrypt('test2');

        $name = 'basicAuth';
        $options = [
            'users' => [
                $userTest,
                $userTest2
            ],
            'usersFile' => '/path/to/my/usersfile',
            'realm' => 'traefik',
            'removeHeader' => 'false',
            'headerField' => 'X-WebAuth-User'
        ];
        $middleware = new \Traefik\Middleware\Basicauth($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($options['usersFile'], $data['usersFile'], 'usersFile');
        $this->assertEquals($options['realm'], $data['realm'], 'realm');
        $this->assertEquals($options['removeHeader'], $data['removeHeader'], 'removeHeader');
        $this->assertEquals($options['headerField'], $data['headerField'], 'headerField');

        $this->assertArrayHasKey('users', $data);
        $this->assertContains($userTest, $data['users']);
        $this->assertContains($userTest2, $data['users']);
    }

    // - `\Traefik\Middleware\Buffering`
    public function testBuffering(): void
    {
        $name = 'buffering';
        $options = [
            'maxRequestBodyBytes' => '2000000',
            'memRequestBodyBytes' => '2000000',
            'maxResponseBodyBytes' => '2000000',
            'memResponseBodyBytes' => '2000000',
            'retryExpression' => 'IsNetworkError() && Attempts() < 2'
        ];

        $middleware = new \Traefik\Middleware\Buffering($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($options['maxRequestBodyBytes'], $data['maxRequestBodyBytes'], 'maxRequestBodyBytes');
        $this->assertEquals($options['memRequestBodyBytes'], $data['memRequestBodyBytes'], 'memRequestBodyBytes');
        $this->assertEquals($options['maxResponseBodyBytes'], $data['maxResponseBodyBytes'], 'maxResponseBodyBytes');
        $this->assertEquals($options['memResponseBodyBytes'], $data['memResponseBodyBytes'], 'memResponseBodyBytes');
        $this->assertEquals($options['retryExpression'], $data['retryExpression'], 'retryExpression');
    }

    // - `\Traefik\Middleware\Chain`
    public function testChain(): void
    {
        $name = 'chain';
        $chain1 = 'https-only';
        $chain2 = 'known-ips';
        $chain3 = 'auth-users';

        $options = [
            'middlewares' => [
                $chain1,
                $chain2,
                $chain3
            ]
        ];

        $middleware = new \Traefik\Middleware\Chain($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertArrayHasKey('middlewares', $data);
        $this->assertContains($chain1, $data['middlewares']);
        $this->assertContains($chain2, $data['middlewares']);
        $this->assertContains($chain3, $data['middlewares']);
    }

    // - `\Traefik\Middleware\Circuitbreaker`
    public function testCircuitbreaker(): void
    {
        $name = 'circuitBreaker';
        $options = [
            'expression' => 'LatencyAtQuantileMS(50.0) > 100'
        ];

        $middleware = new \Traefik\Middleware\Circuitbreaker($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($options['expression'], $data['expression']);
    }

    // - `\Traefik\Middleware\Compress`
    public function testCompress(): void
    {
        $name = 'compress';
        $exclude1 = 'text/event-stream';
        $exclude2 = 'text/plain';
        $options = [
            'excludedContentTypes' => [
                $exclude1,
                $exclude2
            ]
        ];

        $middleware = new \Traefik\Middleware\Compress($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertArrayHasKey('excludedContentTypes', $data);
        $this->assertContains($exclude1, $data['excludedContentTypes']);
        $this->assertContains($exclude2, $data['excludedContentTypes']);
    }

    // - `\Traefik\Middleware\Digestauth`
    public function testDigestauth(): void
    {
        $name = 'digestAuth';
        $realm = 'traefik';
        $user1 = 'test';
        $pass1 = 'test';
        $user2 = 'test2';
        $pass2 = 'test2';

        $userTest = $user1 . ':' . $pass1 . ':' . \Traefik\Middleware\Digestauth::htdigest($user1, $realm, $pass1);
        $userTest2 = $user2 . ':' . $pass2 . ':' . \Traefik\Middleware\Digestauth::htdigest($user2, $realm, $pass2);

        $options = [
            'users' => [
                $userTest,
                $userTest2
            ],
            'usersFile' => '/path/to/my/usersfile',
            'realm' => $realm,
            'removeHeader' => false,
            'headerField' => 'X-WebAuth-User'
        ];

        $middleware = new \Traefik\Middleware\Digestauth($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($options['usersFile'], $data['usersFile'], 'usersFile');
        $this->assertEquals($options['realm'], $data['realm'], 'realm');
        $this->assertEquals($options['removeHeader'], $data['removeHeader'], 'removeHeader');
        $this->assertEquals($options['headerField'], $data['headerField'], 'headerField');

        $this->assertArrayHasKey('users', $data);
        $this->assertContains($userTest, $data['users']);
        $this->assertContains($userTest2, $data['users']);
    }

    // - `\Traefik\Middleware\Errorpage`
    public function testErrorpage(): void
    {
        $name = 'errors';

        $errorRange = '500-599';
        $options = [
            'status' => [
                $errorRange
            ],
            'service' => 'serviceError',
            'query' => '/{status}.html'
        ];

        $middleware = new \Traefik\Middleware\Errorpage($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($options['service'], $data['service'], 'service');
        $this->assertEquals($options['query'], $data['query'], 'query');

        $this->assertArrayHasKey('status', $data);
        $this->assertContains($errorRange, $data['status']);
    }

    // - `\Traefik\Middleware\Forwardauth`
    public function testForwardauth(): void
    {
        $name = 'forwardAuth';
        $options = [
            'address' => 'https://example.com/auth',
            'tls' => [
                'ca' => "path/to/local.crt",
                'caOptional' => true,
                'cert' => "path/to/foo.cert",
                'key' => "path/to/foo.key",
                'insecureSkipVerify' => true
            ],
            'trustForwardHeader' => true,
            'authResponseHeaders' => [
                'X-Auth-User',
                'X-Secret'
            ]
        ];

        $middleware = new \Traefik\Middleware\Forwardauth($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($options['address'], $data['address'], 'address');
        $this->assertEquals($options['trustForwardHeader'], $data['trustForwardHeader'], 'trustForwardHeader');

        $this->assertArrayHasKey('tls', $data);
        $this->assertEquals($options['tls']['ca'], $data['tls']['ca'], 'tls.ca');
        $this->assertEquals($options['tls']['caOptional'], $data['tls']['caOptional'], 'tls.caOptional');
        $this->assertEquals($options['tls']['cert'], $data['tls']['cert'], 'tls.cert');
        $this->assertEquals($options['tls']['key'], $data['tls']['key'], 'tls.key');
        $this->assertEquals($options['tls']['insecureSkipVerify'], $data['tls']['insecureSkipVerify'], 'tls.insecureSkipVerify');

        $this->assertArrayHasKey('authResponseHeaders', $data);
        $this->assertContains($options['authResponseHeaders'][0], $data['authResponseHeaders']);
        $this->assertContains($options['authResponseHeaders'][1], $data['authResponseHeaders']);
    }

    // - `\Traefik\Middleware\Headers`
    public function testHeaders(): void
    {
        $name = 'headers';
        $options = [
            'frameDeny' => true,
            'sslRedirect' => true,
            'customRequestHeaders' => [
                'X-Script-Name' => 'test',
                'X-Custom-Request-Header' => ''
            ],
            'customResponseHeaders' => [
                'X-Custom-Response-Header' => ''
            ]
        ];

        $middleware = new \Traefik\Middleware\Headers($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($options['frameDeny'], $data['frameDeny'], 'frameDeny');
        $this->assertEquals($options['sslRedirect'], $data['sslRedirect'], 'sslRedirect');

        $this->assertArrayHasKey('customRequestHeaders', $data);
        $this->assertArrayHasKey('customResponseHeaders', $data);
    }

    // - `\Traefik\Middleware\Ipwhitelist`
    public function testIpwhitelist(): void
    {
        $name = 'ipWhiteList';
        $ip1 = '127.0.0.1/32';
        $ip2 = '192.168.1.7';

        $options = [
            'sourceRange' => [
                $ip1,
                $ip2
            ],
            'ipStrategy' => [
                'depth' => 2,
                'excludedIPs' => [
                    $ip1,
                    $ip2
                ]
            ]
        ];

        $middleware = new \Traefik\Middleware\Ipwhitelist($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertArrayHasKey('sourceRange', $data);
        $this->assertContains($ip1, $data['sourceRange']);
        $this->assertContains($ip2, $data['sourceRange']);

        $this->assertArrayHasKey('ipStrategy', $data);
        $this->assertArrayHasKey('depth', $data['ipStrategy']);
        $this->assertArrayHasKey('excludedIPs', $data['ipStrategy']);

        $this->assertEquals($options['ipStrategy']['depth'], $data['ipStrategy']['depth'], 'ipStrategy.depth');

        $this->assertContains($ip1, $data['ipStrategy']['excludedIPs']);
        $this->assertContains($ip2, $data['ipStrategy']['excludedIPs']);
    }

    // - `\Traefik\Middleware\Inflightreq`
    public function testInflightreq(): void
    {
        $name = 'inFlightReq';
        $ip1 = '127.0.0.1/32';
        $ip2 = '192.168.1.7';

        $options = [
            'amount' => 10,
            'sourceCriterion' => [
                'requestHeaderName' => 'username',
                'requestHost' => true,
                'ipStrategy' => [
                    'depth' => 2,
                    'excludedIPs' => [
                        $ip1,
                        $ip2
                    ]
                ]
            ]
        ];

        $middleware = new \Traefik\Middleware\Inflightreq($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($options['amount'], $data['amount'], 'amount');

        $this->assertArrayHasKey('sourceCriterion', $data);

        $this->assertEquals(
            $options['sourceCriterion']['requestHeaderName'],
            $data['sourceCriterion']['requestHeaderName'],
            'sourceCriterion.requestHeaderName'
        );

        $this->assertEquals(
            $options['sourceCriterion']['requestHost'],
            $data['sourceCriterion']['requestHost'],
            'sourceCriterion.requestHost'
        );

        $this->assertArrayHasKey('ipStrategy', $data['sourceCriterion']);

        $this->assertArrayHasKey('depth', $data['sourceCriterion']['ipStrategy']);
        $this->assertArrayHasKey('excludedIPs', $data['sourceCriterion']['ipStrategy']);

        $this->assertEquals(
            $options['sourceCriterion']['ipStrategy']['depth'],
            $data['sourceCriterion']['ipStrategy']['depth'],
            'ipStrategy.depth'
        );

        $this->assertContains(
            $ip1,
            $data['sourceCriterion']['ipStrategy']['excludedIPs']
        );
        $this->assertContains(
            $ip2,
            $data['sourceCriterion']['ipStrategy']['excludedIPs']
        );
    }

    // - `\Traefik\Middleware\Passtlsclientcert`
    public function testPasstlsclientcert(): void
    {
        $name = 'passTLSClientCert';
        $options = [
            'pem' => true,
            'info' => [
                'notAfter' => true,
                'notBefore' => true,
                'sans' => true,
                'subject' => [
                    'country' => true,
                    'province' => true,
                    'locality' => true,
                    'organization' => true,
                    'commonName' => true,
                    'serialNumber' => true,
                    'domainComponent' => true
                ],
                'issuer' => [
                    'country' => true,
                    'province' => true,
                    'locality' => true,
                    'organization' => true,
                    'commonName' => true,
                    'serialNumber' => true,
                    'domainComponent' => true
                ],
            ]
        ];
        $middleware = new \Traefik\Middleware\Passtlsclientcert($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertTrue($options == $data);
    }

    // - `\Traefik\Middleware\Ratelimit`
    public function testRatelimit(): void
    {
        $name = 'rateLimit';
        $ip1 = '127.0.0.1/32';
        $ip2 = '192.168.1.7';

        $options = [
            'average' => 100,
            'period' => '1m',
            'burst' => 50,
            'sourceCriterion' => [
                'requestHeaderName' => 'username',
                'requestHost' => true,
                'ipStrategy' => [
                    'depth' => 2,
                    'excludedIPs' => [
                        $ip1,
                        $ip2
                    ]
                ]
            ]
        ];
        $middleware = new \Traefik\Middleware\Ratelimit($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($options['average'], $data['average']);
        $this->assertEquals($options['period'], $data['period']);
        $this->assertEquals($options['burst'], $data['burst']);

        $this->assertArrayHasKey('sourceCriterion', $data);

        $this->assertEquals(
            $options['sourceCriterion']['requestHeaderName'],
            $data['sourceCriterion']['requestHeaderName'],
            'sourceCriterion.requestHeaderName'
        );

        $this->assertEquals(
            $options['sourceCriterion']['requestHost'],
            $data['sourceCriterion']['requestHost'],
            'sourceCriterion.requestHost'
        );

        $this->assertArrayHasKey('ipStrategy', $data['sourceCriterion']);

        $this->assertArrayHasKey('depth', $data['sourceCriterion']['ipStrategy']);
        $this->assertArrayHasKey('excludedIPs', $data['sourceCriterion']['ipStrategy']);

        $this->assertEquals(
            $options['sourceCriterion']['ipStrategy']['depth'],
            $data['sourceCriterion']['ipStrategy']['depth'],
            'ipStrategy.depth'
        );

        $this->assertContains(
            $ip1,
            $data['sourceCriterion']['ipStrategy']['excludedIPs']
        );
        $this->assertContains(
            $ip2,
            $data['sourceCriterion']['ipStrategy']['excludedIPs']
        );
    }

    // - `\Traefik\Middleware\Redirectscheme`
    public function testRedirectscheme(): void
    {
        $name = 'redirectScheme';
        $options = [
            'scheme' => 'https',
            'port' => '443',
            'permanent' => true
        ];
        $middleware = new \Traefik\Middleware\Redirectscheme($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertArrayHasKey('scheme', $data);
        $this->assertEquals($options['scheme'], $data['scheme']);

        $this->assertArrayHasKey('port', $data);
        $this->assertEquals($options['port'], $data['port']);

        $this->assertArrayHasKey('permanent', $data);
        $this->assertEquals($options['permanent'], $data['permanent']);
    }

    // - `\Traefik\Middleware\Redirectregex`
    public function testRedirectregex(): void
    {
        $name = 'redirectRegex';
        $options = [
            'regex' => '^http://localhost/(.*)',
            'replacement' => 'http://mydomain/${1}',
            'permanent' => true
        ];

        $middleware = new \Traefik\Middleware\Redirectregex($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertArrayHasKey('regex', $data);
        $this->assertEquals($options['regex'], $data['regex']);

        $this->assertArrayHasKey('replacement', $data);
        $this->assertEquals($options['replacement'], $data['replacement']);

        $this->assertArrayHasKey('permanent', $data);
        $this->assertEquals($options['permanent'], $data['permanent']);
    }

    // - `\Traefik\Middleware\Replacepath`
    public function testReplacepath(): void
    {
        $name = 'replacePath';
        $options = [
            'path' => '/foo'
        ];
        $middleware = new \Traefik\Middleware\Replacepath($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertArrayHasKey('path', $data);
        $this->assertEquals($options['path'], $data['path']);
    }

    // - `\Traefik\Middleware\Replacepathregex`
    public function testReplacepathregex(): void
    {

        $name = 'replacePathRegex';
        $options = [
            'regex' => '^/foo/(.*)',
            'replacement' => '/bar/$1'
        ];

        $middleware = new \Traefik\Middleware\Replacepathregex($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertArrayHasKey('regex', $data);
        $this->assertEquals($options['regex'], $data['regex']);

        $this->assertArrayHasKey('replacement', $data);
        $this->assertEquals($options['replacement'], $data['replacement']);
    }

    // - `\Traefik\Middleware\Retry`
    public function testRetry(): void
    {
        $name = 'retry';
        $options = [
            'attempts' => 50
        ];
        $middleware = new \Traefik\Middleware\Retry($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertArrayHasKey('attempts', $data);
        $this->assertEquals($options['attempts'], $data['attempts']);
    }

    // - `\Traefik\Middleware\Stripprefix`
    public function testStripprefix(): void
    {
        $name = 'stripPrefix';
        $prefix1 = '/foobar';
        $prefix2 = '/fiibar';
        $options = [
            'prefixes' => [
                $prefix1,
                $prefix2
            ],
            'forceSlash' => false
        ];

        $middleware = new \Traefik\Middleware\Stripprefix($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertArrayHasKey('forceSlash', $data);
        $this->assertEquals($options['forceSlash'], $data['forceSlash']);

        $this->assertArrayHasKey('prefixes', $data);
        $this->assertContains($prefix1, $data['prefixes']);
        $this->assertContains($prefix2, $data['prefixes']);
    }

    // - `\Traefik\Middleware\Stripprefixregex`
    public function testStripprefixregex(): void
    {

        $name = 'stripPrefixRegex';
        $prefixRegex1 = '/foo/[a-z0-9]+/[0-9]+/';
        $options = [
            'regex' => [
                $prefixRegex1
            ]
        ];

        $middleware = new \Traefik\Middleware\Stripprefixregex($options);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertArrayHasKey('regex', $data);
        $this->assertContains($prefixRegex1, $data['regex']);

    }

}
