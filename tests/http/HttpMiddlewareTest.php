<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Traefik\Middleware\{
    AddPrefix,
    Config\AddPrefix as AddPrefixConfig,
    BasicAuth,
    Config\BasicAuth as BasicAuthConfig,
    Buffering,
    Config\Buffering as BufferingConfig,
    Chain,
    Config\Chain as ChainConfig,
    CircuitBreaker,
    Config\CircuitBreaker as CircuitBreakerConfig,
    Compress,
    Config\Compress as CompressConfig,
    DigestAuth,
    Config\DigestAuth as DigestAuthConfig,
    ErrorPage,
    Config\ErrorPage as ErrorPageConfig,
    ForwardAuth,
    Config\ForwardAuth as ForwardAuthConfig,
    Headers,
    Config\Headers as HeadersConfig,
    InFlightReq,
    Config\InFlightReq as InFlightReqConfig,
    IpWhiteList,
    Config\IpWhiteList as IpWhiteListConfig,
    PassTLSClientCert,
    Config\PassTLSClientCert as PassTLSClientCertConfig,
    RateLimit,
    Config\RateLimit as RateLimitConfig,
    RedirectRegex,
    Config\RedirectRegex as RedirectRegexConfig,
    RedirectScheme,
    Config\RedirectScheme as RedirectSchemeConfig,
    ReplacePath,
    Config\ReplacePath as ReplacePathConfig,
    ReplacePathRegex,
    Config\ReplacePathRegex as ReplacePathRegexConfig,
    Retry,
    Config\Retry as RetryConfig,
    StripPrefix,
    Config\StripPrefix as StripPrefixConfig,
    StripPrefixRegex,
    Config\StripPrefixRegex as StripPrefixRegexConfig,

    Config\Certificate as CertificateConfig,
    Config\SourceCriterion,
    Config\Tls as TlsConfig,
};

final class HttpMiddlewareTest extends TestCase {

    public function testAddprefix(): void {
        $name = 'addPrefix';
        $prefixValue = '/foo';
        $addPrefixConfig = (new AddPrefixConfig())->setPrefix($prefixValue);

        $middleware = new AddPrefix($addPrefixConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertArrayHasKey('prefix', $data);
        $this->assertEquals($prefixValue, $data['prefix']);
    }

    public function testBasicAuth(): void {
        $name = 'basicAuth';

        $userTest = 'test:' . BasicAuthConfig::bcrypt('test');

        $usersFile = '/path/to/my/usersfile';
        $realm = 'traefik';
        $removeHeader = false;
        $headerField = 'X-WebAuth-User';

        $basicAuthConfig = (new BasicAuthConfig())
            ->setRemoveHeader($removeHeader)
            ->setUsersFile($usersFile)
            ->setRealm($realm)
            ->setHeaderField($headerField)
            ->addUser($userTest)
            ->addUserWithPassword('test2', 'test2');

        $middleware = new BasicAuth($basicAuthConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($usersFile, $data['usersFile'], 'usersFile');
        $this->assertEquals($realm, $data['realm'], 'realm');
        $this->assertEquals($removeHeader, $data['removeHeader'], 'removeHeader');
        $this->assertEquals($headerField, $data['headerField'], 'headerField');

        $this->assertArrayHasKey('users', $data);
        $this->assertContains($userTest, $data['users']);
        $this->assertEquals(0, strpos($data['users'][1], 'test2:'));

    }

    public function testBuffering(): void {
        $name = 'buffering';

        $maxRequestBodyBytes = 2000000;
        $memRequestBodyBytes = 2000000;
        $maxResponseBodyBytes = 2000000;
        $memResponseBodyBytes = 2000000;
        $retryExpression = 'IsNetworkError() && Attempts() < 2';


        $bufferingConfig = (new BufferingConfig())
            ->setMaxRequestBodyBytes($maxRequestBodyBytes)
            ->setMaxResponseBodyBytes($memRequestBodyBytes)
            ->setMemRequestBodyBytes($maxResponseBodyBytes)
            ->setMemResponseBodyBytes($memResponseBodyBytes)
            ->setRetryExpression($retryExpression);
        $middleware = new Buffering($bufferingConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($maxRequestBodyBytes, $data['maxRequestBodyBytes'], 'maxRequestBodyBytes');
        $this->assertEquals($memRequestBodyBytes, $data['memRequestBodyBytes'], 'memRequestBodyBytes');
        $this->assertEquals($maxResponseBodyBytes, $data['maxResponseBodyBytes'], 'maxResponseBodyBytes');
        $this->assertEquals($memResponseBodyBytes, $data['memResponseBodyBytes'], 'memResponseBodyBytes');
        $this->assertEquals($retryExpression, $data['retryExpression'], 'retryExpression');
    }

    public function testChain(): void {
        $name = 'chain';
        $chain1 = 'https-only';
        $chain2 = 'known-ips';
        $chain3 = 'auth-users';

        $chainConfig = (new ChainConfig())
            ->addMiddleware($chain1)
            ->addMiddleware($chain2)
            ->addMiddleware($chain3);

        $middleware = new Chain($chainConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertArrayHasKey('middlewares', $data);
        $this->assertContains($chain1, $data['middlewares']);
        $this->assertContains($chain2, $data['middlewares']);
        $this->assertContains($chain3, $data['middlewares']);
    }

    public function testCircuitbreaker(): void {
        $name = 'circuitBreaker';
        $expression = 'LatencyAtQuantileMS(50.0) > 100';

        $circuitBreakerConfig = (new CircuitBreakerConfig())
            ->setExpression($expression);

        $middleware = new CircuitBreaker($circuitBreakerConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($expression, $data['expression']);
    }

    public function testCompress(): void {
        $name = 'compress';
        $exclude1 = 'text/event-stream';
        $exclude2 = 'text/plain';

        $compressConfig = (new CompressConfig())
            ->addExcludedContentType($exclude1)
            ->addExcludedContentType($exclude2);

        $middleware = new Compress($compressConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertArrayHasKey('excludedContentTypes', $data);
        $this->assertContains($exclude1, $data['excludedContentTypes']);
        $this->assertContains($exclude2, $data['excludedContentTypes']);
    }

    public function testDigestauth(): void {
        $name = 'digestAuth';
        $realm = 'traefik';
        $user1 = 'test';
        $pass1 = 'test';
        $user2 = 'test2';
        $pass2 = 'test2';

        $userTest = $user1 . ':' . $pass1 . ':' . DigestauthConfig::htdigest($user1, $realm, $pass1);

        $usersFile = '/path/to/my/usersfile';
        $removeHeader = false;
        $headerField = 'X-WebAuth-User';

        $digestAuthConfig = (new DigestAuthConfig())
            ->setHeaderField($headerField)
            ->setRealm($realm)
            ->setRemoveHeader($removeHeader)
            ->setUsersFile($usersFile)
            ->addUser($userTest);

        $digestAuthConfig->addUserWithPassword($user2, $pass2);

        $middleware = new DigestAuth($digestAuthConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($usersFile, $data['usersFile'], 'usersFile');
        $this->assertEquals($realm, $data['realm'], 'realm');
        $this->assertEquals($removeHeader, $data['removeHeader'], 'removeHeader');
        $this->assertEquals($headerField, $data['headerField'], 'headerField');

        $this->assertArrayHasKey('users', $data);
        $this->assertContains($userTest, $data['users']);
        $this->assertEquals(0, strpos($data['users'][1], $user2 . ':'));
    }

    public function testErrorpage(): void {
        $name = 'errors';

        $errorRange = '500-599';

        $service = 'serviceError';
        $query = '/{status}.html';

        $errorPageConfig = (new ErrorPageConfig())
            ->setQuery($query)
            ->setService($service)
            ->addStatus($errorRange);

        $middleware = new ErrorPage($errorPageConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($service, $data['service'], 'service');
        $this->assertEquals($query, $data['query'], 'query');

        $this->assertArrayHasKey('status', $data);
        $this->assertContains($errorRange, $data['status']);
    }

    public function testForwardauth(): void {
        $name = 'forwardAuth';

        $address = 'https://example.com/auth';
        $trustForwardHeader = true;
        $authResponseHeader1 = 'X-Auth-User';
        $authResponseHeader2 = 'X-Secret';

        $ca = "path/to/local.crt";
        $caOptional = true;
        $cert = "path/to/foo.cert";
        $key = "path/to/foo.key";
        $insecureSkipVerify = true;

        $tlsConfig = (new TlsConfig())
            ->setInsecureSkipVerify($insecureSkipVerify)
            ->setKey($key)
            ->setCert($cert)
            ->setCaOptional($caOptional)
            ->setCa($ca);

        $forwardAuthConfig = (new ForwardAuthConfig())
            ->setTrustForwardHeader($trustForwardHeader)
            ->setTls($tlsConfig)
            ->setAddress($address)
            ->addAuthResponseHeaders($authResponseHeader1)
            ->addAuthResponseHeaders($authResponseHeader2);

        $middleware = new ForwardAuth($forwardAuthConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($address, $data['address'], 'address');
        $this->assertEquals($trustForwardHeader, $data['trustForwardHeader'], 'trustForwardHeader');

        $this->assertArrayHasKey('tls', $data);
        $this->assertEquals($ca, $data['tls']['ca'], 'tls.ca');
        $this->assertEquals($caOptional, $data['tls']['caOptional'], 'tls.caOptional');
        $this->assertEquals($cert, $data['tls']['cert'], 'tls.cert');
        $this->assertEquals($key, $data['tls']['key'], 'tls.key');
        $this->assertEquals($insecureSkipVerify, $data['tls']['insecureSkipVerify'], 'tls.insecureSkipVerify');

        $this->assertArrayHasKey('authResponseHeaders', $data);
        $this->assertContains($authResponseHeader1, $data['authResponseHeaders']);
        $this->assertContains($authResponseHeader2, $data['authResponseHeaders']);
    }

    public function testHeaders(): void {
        $name = 'headers';

        $frameDeny = true;
        $sslRedirect = true;

        $customRequestHeaders1Key = 'X-Script-Name';
        $customRequestHeaders1Value = 'test';
        $customRequestHeaders2Key = 'X-Custom-Request-Header';
        $customRequestHeaders2Value = '';

        $customResponseHeaders1Key = 'X-Custom-Response-Header';
        $customResponseHeaders1Value = '';

        $headersConfig = (new HeadersConfig())
            ->setFrameDeny($frameDeny)
            ->setSslRedirect($sslRedirect)
            ->addCustomRequestHeaders($customRequestHeaders1Key, $customRequestHeaders1Value)
            ->addCustomRequestHeaders($customRequestHeaders2Key, $customRequestHeaders2Value)
            ->addCustomResponseHeaders($customResponseHeaders1Key, $customResponseHeaders1Value);

        $middleware = new Headers($headersConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($frameDeny, $data['frameDeny'], 'frameDeny');
        $this->assertEquals($sslRedirect, $data['sslRedirect'], 'sslRedirect');

        $this->assertArrayHasKey('customRequestHeaders', $data);
        $this->assertArrayHasKey('customResponseHeaders', $data);
    }

    public function testIpwhitelist(): void {
        $name = 'ipWhiteList';
        $ip1 = '127.0.0.1/32';
        $ip2 = '192.168.1.7';
        $ipStrategyDepth = 2;

        $sourceCriterionConfig = (new IpWhiteListConfig())
            ->setIpStrategyDepth($ipStrategyDepth)
            ->addIpStrategyExcludedIP($ip1)
            ->addIpStrategyExcludedIP($ip2)
            ->addSourceRange($ip1)
            ->addSourceRange($ip2);

        $middleware = new IpWhiteList($sourceCriterionConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertArrayHasKey('sourceRange', $data);
        $this->assertContains($ip1, $data['sourceRange']);
        $this->assertContains($ip2, $data['sourceRange']);

        $this->assertArrayHasKey('ipStrategy', $data);
        $this->assertArrayHasKey('depth', $data['ipStrategy']);
        $this->assertArrayHasKey('excludedIPs', $data['ipStrategy']);

        $this->assertEquals($ipStrategyDepth, $data['ipStrategy']['depth'], 'ipStrategy.depth');

        $this->assertContains($ip1, $data['ipStrategy']['excludedIPs']);
        $this->assertContains($ip2, $data['ipStrategy']['excludedIPs']);
    }

    public function testInflightreq(): void {
        $name = 'inFlightReq';
        $ip1 = '127.0.0.1/32';
        $ip2 = '192.168.1.7';

        $amount = 10;
        $ipStrategyDepth = 2;
        $requestHeaderName = 'username';
        $requestHost = true;

        $sourceCriterionConfig = (new SourceCriterion())
            ->setIpStrategyDepth($ipStrategyDepth)
            ->setRequestHeaderName($requestHeaderName)
            ->setRequestHost($requestHost)
            ->addIpStrategyExcludedIP($ip1)
            ->addIpStrategyExcludedIP($ip2);

        $inFlightReqConfig = (new InFlightReqConfig())
            ->setAmount($amount)
            ->setSourceCriterion($sourceCriterionConfig);

        $middleware = new InFlightReq($inFlightReqConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertEquals($amount, $data['amount'], 'amount');

        $this->assertArrayHasKey('sourceCriterion', $data);

        $this->assertEquals(
            $requestHeaderName,
            $data['sourceCriterion']['requestHeaderName'],
            'sourceCriterion.requestHeaderName'
        );

        $this->assertEquals(
            $requestHost,
            $data['sourceCriterion']['requestHost'],
            'sourceCriterion.requestHost'
        );

        $this->assertArrayHasKey('ipStrategy', $data['sourceCriterion']);

        $this->assertArrayHasKey('depth', $data['sourceCriterion']['ipStrategy']);
        $this->assertArrayHasKey('excludedIPs', $data['sourceCriterion']['ipStrategy']);

        $this->assertEquals(
            $ipStrategyDepth,
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

    public function testPasstlsclientcert(): void {
        $name = 'passTLSClientCert';
        $expectedOptions = [
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
        $subject = (new CertificateConfig())
            ->setCommonName(true)
            ->setCountry(true)
            ->setDomainComponent(true)
            ->setLocality(true)
            ->setOrganization(true)
            ->setProvince(true)
            ->setSerialNumber(true);

        $issuer = (new CertificateConfig())
            ->setCommonName(true)
            ->setCountry(true)
            ->setDomainComponent(true)
            ->setLocality(true)
            ->setOrganization(true)
            ->setProvince(true)
            ->setSerialNumber(true);

        $passTLSClientCertConfig = (new PassTLSClientCertConfig())
            ->setPem(true)
            ->setInfoNotAfter(true)
            ->setInfoNotBefore(true)
            ->setInfoSans(true)
            ->setInfoSubject($subject)
            ->setInfoIssuer($issuer);
        $middleware = new PassTLSClientCert($passTLSClientCertConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertTrue($expectedOptions == $data);
    }

    public function testRatelimit(): void {
        $name = 'rateLimit';
        $ip1 = '127.0.0.1/32';
        $ip2 = '192.168.1.7';
        $average = 100;
        $period = '1m';
        $burst = 50;
        $requestHeaderName = 'username';
        $requestHost = true;
        $ipStrategyDepth = 2;

        $sourceCriterionConfig = (new SourceCriterion())
            ->setRequestHeaderName($requestHeaderName)
            ->setRequestHost($requestHost)
            ->setIpStrategyDepth($ipStrategyDepth)
            ->addIpStrategyExcludedIP($ip1)
            ->addIpStrategyExcludedIP($ip2);

        $rateLimitConfig = (new RatelimitConfig())
            ->setAverage($average)
            ->setPeriod($period)
            ->setBurst($burst)
            ->setSourceCriterion($sourceCriterionConfig);

        $middleware = new RateLimit($rateLimitConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertArrayHasKey('average', $data);
        $this->assertEquals($average, $data['average']);
        $this->assertArrayHasKey('period', $data);
        $this->assertEquals($period, $data['period']);
        $this->assertArrayHasKey('burst', $data);
        $this->assertEquals($burst, $data['burst']);

        $this->assertArrayHasKey('sourceCriterion', $data);

        $this->assertEquals(
            $requestHeaderName,
            $data['sourceCriterion']['requestHeaderName'],
            'sourceCriterion.requestHeaderName'
        );

        $this->assertEquals(
            $requestHost,
            $data['sourceCriterion']['requestHost'],
            'sourceCriterion.requestHost'
        );

        $this->assertArrayHasKey('ipStrategy', $data['sourceCriterion']);

        $this->assertArrayHasKey('depth', $data['sourceCriterion']['ipStrategy']);
        $this->assertArrayHasKey('excludedIPs', $data['sourceCriterion']['ipStrategy']);

        $this->assertEquals(
            $ipStrategyDepth,
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

    public function testRedirectscheme(): void {
        $name = 'redirectScheme';

        $scheme = 'https';
        $port = '443';
        $permanent = true;

        $redirectSchemeConfig = (new RedirectSchemeConfig())
            ->setScheme('https')
            ->setPort('443')
            ->setPermanent(true);

        $middleware = new RedirectScheme($redirectSchemeConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertArrayHasKey('scheme', $data);
        $this->assertEquals($scheme, $data['scheme']);

        $this->assertArrayHasKey('port', $data);
        $this->assertEquals($port, $data['port']);

        $this->assertArrayHasKey('permanent', $data);
        $this->assertEquals($permanent, $data['permanent']);
    }

    public function testRedirectregex(): void {
        $name = 'redirectRegex';

        $regex = '^http://localhost/(.*)';
        $replacement = 'http://mydomain/${1}';
        $permanent = true;

        $redirectRegexConfig = (new RedirectRegexConfig())
            ->setRegex($regex)
            ->setReplacement($replacement)
            ->setPermanent($permanent);

        $middleware = new RedirectRegex($redirectRegexConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertArrayHasKey('regex', $data);
        $this->assertEquals($regex, $data['regex']);

        $this->assertArrayHasKey('replacement', $data);
        $this->assertEquals($replacement, $data['replacement']);

        $this->assertArrayHasKey('permanent', $data);
        $this->assertEquals($permanent, $data['permanent']);
    }

    public function testReplacepath(): void {
        $name = 'replacePath';

        $path = '/foo';

        $replacePathConfig = (new ReplacePathConfig())
            ->setPath($path);

        $middleware = new ReplacePath($replacePathConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertArrayHasKey('path', $data);
        $this->assertEquals($path, $data['path']);
    }

    public function testReplacepathregex(): void {

        $name = 'replacePathRegex';

        $regex = '^/foo/(.*)';
        $replacement = '/bar/$1';

        $replacePathRegexConfig = (new ReplacePathRegexConfig())
            ->setRegex($regex)
            ->setReplacement($replacement);

        $middleware = new ReplacePathRegex($replacePathRegexConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertArrayHasKey('regex', $data);
        $this->assertEquals($regex, $data['regex']);

        $this->assertArrayHasKey('replacement', $data);
        $this->assertEquals($replacement, $data['replacement']);
    }

    public function testRetry(): void {
        $name = 'retry';
        $attempts = 50;

        $retryConfig = (new RetryConfig())
            ->setAttempts($attempts);

        $middleware = new Retry($retryConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertArrayHasKey('attempts', $data);
        $this->assertEquals($attempts, $data['attempts']);
    }

    public function testStripprefix(): void {
        $name = 'stripPrefix';
        $prefix1 = '/foobar';
        $prefix2 = '/foobar';

        $forceSlash = false;

        $stripPrefixConfig = (new StripPrefixConfig())
            ->setForceSlash($forceSlash)
            ->addPrefixes($prefix1)
            ->addPrefixes($prefix2);

        $middleware = new StripPrefix($stripPrefixConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());
        $this->assertArrayHasKey('forceSlash', $data);
        $this->assertEquals($forceSlash, $data['forceSlash']);

        $this->assertArrayHasKey('prefixes', $data);
        $this->assertContains($prefix1, $data['prefixes']);
        $this->assertContains($prefix2, $data['prefixes']);
    }

    public function testStripprefixregex(): void {

        $name = 'stripPrefixRegex';
        $prefixRegex1 = '/foo/[a-z0-9]+/[0-9]+/';

        $stripPrefixRegexConfig = (new StripPrefixRegexConfig())
            ->addRegex($prefixRegex1);

        $middleware = new StripPrefixRegex($stripPrefixRegexConfig);

        $data = $middleware->getData();

        $this->assertEquals($name, $middleware->getName());

        $this->assertArrayHasKey('regex', $data);
        $this->assertContains($prefixRegex1, $data['regex']);
    }
}
