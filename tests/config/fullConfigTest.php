<?php

declare(strict_types=1);

namespace config;

use PHPUnit\Framework\TestCase;

use Traefik\Middleware\{
    Config\AddPrefix as AddPrefixConfig,
    Config\BasicAuth as BasicAuthConfig,
    Config\Buffering as BufferingConfig,
    Config\Chain as ChainConfig,
    Config\CircuitBreaker as CircuitBreakerConfig,
    Config\Compress as CompressConfig,
    Config\DigestAuth as DigestAuthConfig,
    Config\ErrorPage as ErrorPageConfig,
    Config\ForwardAuth as ForwardAuthConfig,
    Config\Headers as HeadersConfig,
    Config\InFlightReq as InFlightReqConfig,
    Config\IpWhiteList as IpWhiteListConfig,
    Config\PassTLSClientCert as PassTLSClientCertConfig,
    Config\RateLimit as RateLimitConfig,
    Config\RedirectRegex as RedirectRegexConfig,
    Config\RedirectScheme as RedirectSchemeConfig,
    Config\ReplacePath as ReplacePathConfig,
    Config\ReplacePathRegex as ReplacePathRegexConfig,
    Config\Retry as RetryConfig,
    Config\StripPrefix as StripPrefixConfig,
    Config\StripPrefixRegex as StripPrefixRegexConfig,
    Config\ContentType as ContentTypeConfig,

    Config\Certificate as CertificateConfig,
    Config\SourceCriterion,
    Config\Tls as TlsConfig,
};

use Traefik\Config;

final class fullConfigTest extends TestCase
{
    protected static string $jsonValidation;

    public static function setUpBeforeClass(): void
    {
        self::$jsonValidation = file_get_contents(dirname(__FILE__) . '/fullConfig.json');
    }

    public function testFullConfig()
    {
        $config = new Config();

        $config->setHttpService('Service01', 'foobar')->addServer('foobar');
        $config->setHttpRouter('Router0', 'foobar', 'foobar')
            ->setEntryPoints(['foobar', 'foobar'])
            ->setPriority(42)
            ->setMiddlewares(['foobar', 'foobar']);
        $config->setHttpRouter('Router1', 'foobar', 'foobar')
            ->setEntryPoints(['foobar', 'foobar'])
            ->setPriority(42)
            ->setMiddlewares(['foobar', 'foobar']);

        $config->setUdpService('UDPService01', 'foobar')->addServer('foobar');
        $config->setUdpRouter('UDPRouter0', '', 'foobar')->setEntryPoints(['foobar', 'foobar']);
        $config->setUdpRouter('UDPRouter1', '', 'foobar')->setEntryPoints(['foobar', 'foobar']);

        $config->setTcpService('TCPService01', 'foobar')
            ->setTerminationDelay(42)
            ->addServer('foobar');
        $config->setTcpRouter('TCPRouter0', 'foobar', 'foobar')
            ->setEntryPoints(['foobar', 'foobar']);
        $config->setTcpRouter('TCPRouter1', 'foobar', 'foobar')
            ->setEntryPoints(['foobar', 'foobar']);

        $config->addMiddleWare('Middleware00', $this->getMiddleware00Config());
        $config->addMiddleWare('Middleware01', $this->getMiddleware01Config());
        $config->addMiddleWare('Middleware02', $this->getMiddleware02Config());
        $config->addMiddleWare('Middleware03', $this->getMiddleware03Config());
        $config->addMiddleWare('Middleware04', $this->getMiddleware04Config());
        $config->addMiddleWare('Middleware05', $this->getMiddleware05Config());
        $config->addMiddleWare('Middleware06', $this->getMiddleware06Config());
        $config->addMiddleWare('Middleware07', $this->getMiddleware07Config());
        $config->addMiddleWare('Middleware08', $this->getMiddleware08Config());
        $config->addMiddleWare('Middleware09', $this->getMiddleware09Config());
        $config->addMiddleWare('Middleware10', $this->getMiddleware10Config());
        $config->addMiddleWare('Middleware11', $this->getMiddleware11Config());
        $config->addMiddleWare('Middleware12', $this->getMiddleware12Config());
        $config->addMiddleWare('Middleware13', $this->getMiddleware13Config());
        $config->addMiddleWare('Middleware15', $this->getMiddleware15Config());
        $config->addMiddleWare('Middleware16', $this->getMiddleware16Config());
        $config->addMiddleWare('Middleware17', $this->getMiddleware17Config());
        $config->addMiddleWare('Middleware18', $this->getMiddleware18Config());
        $config->addMiddleWare('Middleware19', $this->getMiddleware19Config());
        $config->addMiddleWare('Middleware20', $this->getMiddleware20Config());
        $config->addMiddleWare('Middleware21', $this->getMiddleware21Config());
        $config->addMiddleWare('Middleware22', $this->getMiddleware22Config());

        $phpConfig = json_decode($config->getJsonConfig(), true);
        $jsonConfig = json_decode(self::$jsonValidation, true);

        $this->validateArray($jsonConfig, $phpConfig);
        $this->validateArray($phpConfig, $jsonConfig);
    }

    private function getMiddleware00Config(): AddPrefixConfig
    {
        $prefixValue = 'foobar';
        return (new AddPrefixConfig())->setPrefix($prefixValue);
    }

    private function getMiddleware01Config(): BasicAuthConfig
    {
        $removeHeader = true;
        $realm = 'foobar';
        $usersFile = 'foobar';
        $headerField = 'foobar';
        $user1 = 'foobar';
        $user2 = 'foobar';

        return (new BasicAuthConfig())
            ->setUsersFile($usersFile)
            ->setRemoveHeader($removeHeader)
            ->setRealm($realm)
            ->setHeaderField($headerField)
            ->addUser($user1)
            ->addUser($user2);
    }

    private function getMiddleware02Config(): BufferingConfig
    {
        $memRequestBodyBytes = 42;
        $maxRequestBodyBytes = 42;
        $memResponseBodyBytes = 42;
        $maxResponseBodyBytes = 42;
        $retryExpression = 'foobar';
        return (new BufferingConfig())
            ->setRetryExpression($retryExpression)
            ->setMemResponseBodyBytes($memResponseBodyBytes)
            ->setMemRequestBodyBytes($memRequestBodyBytes)
            ->setMaxResponseBodyBytes($maxResponseBodyBytes)
            ->setMaxRequestBodyBytes($maxRequestBodyBytes);
    }

    private function getMiddleware03Config(): ChainConfig
    {
        $middleware1 = 'foobar';
        $middleware2 = 'foobar';
        return (new ChainConfig())
            ->addMiddleware($middleware1)
            ->addMiddleware($middleware2);

    }

    private function getMiddleware04Config(): CircuitBreakerConfig
    {
        $expression = 'foobar';
        return (new CircuitBreakerConfig())
            ->setExpression($expression);
    }

    private function getMiddleware05Config(): CompressConfig
    {
        $excludedContentType1 = 'foobar';
        $excludedContentType2 = 'foobar';
        return (new CompressConfig())
            ->addExcludedContentType($excludedContentType1)
            ->addExcludedContentType($excludedContentType2);
    }

    private function getMiddleware06Config(): ContentTypeConfig
    {
        $autoDetect = true;

        return (new ContentTypeConfig())
            ->setAutoDetect($autoDetect);
    }

    private function getMiddleware07Config(): DigestAuthConfig
    {
        $removeHeader = true;
        $realm = 'foobar';
        $usersFile = 'foobar';
        $headerField = 'foobar';
        $user1 = 'foobar';
        $user2 = 'foobar';
        return (new DigestAuthConfig())
            ->setHeaderField($headerField)
            ->setRealm($realm)
            ->setRemoveHeader($removeHeader)
            ->setUsersFile($usersFile)
            ->addUser($user1)
            ->addUser($user2);
    }

    private function getMiddleware08Config(): ErrorPageConfig
    {
        $status1 = 'foobar';
        $status2 = 'foobar';
        $query = 'foobar';
        $service = 'foobar';
        return (new ErrorPageConfig())
            ->setService($service)
            ->setQuery($query)
            ->addStatus($status1)
            ->addStatus($status2);
    }

    private function getMiddleware09Config(): ForwardAuthConfig
    {

        $tls_cert = 'foobar';
        $tls_ca = 'foobar';
        $tls_caOptional = true;
        $tls_insecureSkipVerify = true;
        $tls_key = 'foobar';
        $address = 'foobar';
        $trustForwardHeader = true;

        $authResponseHeader1 = 'foobar';
        $authResponseHeader2 = 'foobar';

        $tlsConfig = (new TlsConfig() )
            ->setCa($tls_ca)
            ->setCaOptional($tls_caOptional)
            ->setCert($tls_cert)
            ->setInsecureSkipVerify($tls_insecureSkipVerify)
            ->setKey($tls_key)
        ;
        return (new ForwardAuthConfig())
            ->setTls($tlsConfig)
            ->setAddress($address)
            ->setTrustForwardHeader($trustForwardHeader)
            ->addAuthResponseHeaders($authResponseHeader1)
            ->addAuthResponseHeaders($authResponseHeader2);
    }

    private function getMiddleware10Config(): HeadersConfig
    {
        $stsIncludeSubdomains = true;
        $addVaryHeader = true;
        $referrerPolicy = 'foobar';
        $accessControlAllowOrigin = 'foobar';
        $sslTemporaryRedirect = true;
        $contentTypeNosniff = true;
        $stsSeconds = 42;
        $sslRedirect = true;
        $accessControlAllowCredentials = true;
        $sslHost = 'foobar';
        $browserXssFilter = true;
        $contentSecurityPolicy = 'foobar';
        $sslForceHost = true;
        $forceSTSHeader = true;
        $publicKey = 'foobar';
        $frameDeny = true;
        $isDevelopment = true;
        $customBrowserXSSValue = 'foobar';
        $accessControlMaxAge = 42;
        $customFrameOptionsValue = 'foobar';
        $stsPreload = true;
        $featurePolicy = 'foobar';

        $accessControlAllowOriginList1 = 'foobar';
        $accessControlAllowOriginList2 = 'foobar';
        $accessControlAllowMethod1 = 'foobar';
        $accessControlAllowMethod2 = 'foobar';
        $hostsProxyHeader1 = 'foobar';
        $hostsProxyHeader2 = 'foobar';
        $accessControlAllowHeader1 = 'foobar';
        $accessControlAllowHeader2 = 'foobar';
        $allowedHost1 = 'foobar';
        $allowedHost2 = 'foobar';
        $accessControlExposeHeader1 = 'foobar';
        $accessControlExposeHeader2 = 'foobar';

        $customRequestHeader1Key = 'name0';
        $customRequestHeader1Value = 'foobar';
        $customRequestHeader2Key = 'name1';
        $customRequestHeader2Value = 'foobar';

        $sslProxyHeaders1Key = 'name0';
        $sslProxyHeaders1Value = 'foobar';
        $sslProxyHeaders2Key = 'name1';
        $sslProxyHeaders2Value = 'foobar';

        $customResponseHeader1Key = 'name0';
        $customResponseHeader1Value = 'foobar';
        $customResponseHeader2Key = 'name1';
        $customResponseHeader2Value = 'foobar';

        return (new HeadersConfig())
            ->addCustomRequestHeaders($customRequestHeader1Key, $customRequestHeader1Value)
            ->addCustomRequestHeaders($customRequestHeader2Key, $customRequestHeader2Value)
            ->addSslProxyHeaders($sslProxyHeaders1Key, $sslProxyHeaders1Value)
            ->addSslProxyHeaders($sslProxyHeaders2Key, $sslProxyHeaders2Value)
            ->addCustomResponseHeaders($customResponseHeader1Key, $customResponseHeader1Value)
            ->addCustomResponseHeaders($customResponseHeader2Key, $customResponseHeader2Value)

            ->addAccessControlAllowOriginList($accessControlAllowOriginList1)
            ->addAccessControlAllowOriginList($accessControlAllowOriginList2)
            ->addAccessControlAllowMethods($accessControlAllowMethod1)
            ->addAccessControlAllowMethods($accessControlAllowMethod2)
            ->addHostsProxyHeaders($hostsProxyHeader1)
            ->addHostsProxyHeaders($hostsProxyHeader2)
            ->addAccessControlAllowHeaders($accessControlAllowHeader1)
            ->addAccessControlAllowHeaders($accessControlAllowHeader2)
            ->addAllowedHosts($allowedHost1)
            ->addAllowedHosts($allowedHost2)
            ->addAccessControlExposeHeaders($accessControlExposeHeader1)
            ->addAccessControlExposeHeaders($accessControlExposeHeader2)

            ->setStsIncludeSubdomains($stsIncludeSubdomains)
            ->setAddVaryHeader($addVaryHeader)
            ->setAccessControlAllowOrigin($accessControlAllowOrigin)
            ->setSslTemporaryRedirect($sslTemporaryRedirect)
            ->setContentTypeNosniff($contentTypeNosniff)
            ->setStsSeconds($stsSeconds)
            ->setSslRedirect($sslRedirect)
            ->setAccessControlAllowCredentials($accessControlAllowCredentials)
            ->setSslHost($sslHost)
            ->setBrowserXssFilter($browserXssFilter)
            ->setContentSecurityPolicy($contentSecurityPolicy)
            ->setReferrerPolicy($referrerPolicy)
            ->setSslForceHost($sslForceHost)
            ->setForceSTSHeader($forceSTSHeader)
            ->setPublicKey($publicKey)
            ->setFrameDeny($frameDeny)
            ->setIsDevelopment($isDevelopment)
            ->setCustomBrowserXSSValue($customBrowserXSSValue)
            ->setAccessControlMaxAge($accessControlMaxAge)
            ->setCustomFrameOptionsValue($customFrameOptionsValue)
            ->setStsPreload($stsPreload)
            ->setFeaturePolicy($featurePolicy)
            ;

    }

    private function getMiddleware11Config(): IpWhiteListConfig
    {
        $ip1 = 'foobar';
        $ip2 = 'foobar';
        $ipStrategyDepth = 42;

        return (new IpWhiteListConfig())
            ->setIpStrategyDepth($ipStrategyDepth)
            ->addIpStrategyExcludedIP($ip1)
            ->addIpStrategyExcludedIP($ip2)
            ->addSourceRange($ip1)
            ->addSourceRange($ip2);
    }

    private function getMiddleware12Config(): InFlightReqConfig
    {
        $ip1 = 'foobar';
        $ip2 = 'foobar';

        $amount = 42;
        $ipStrategyDepth = 42;
        $requestHeaderName = 'foobar';
        $requestHost = true;

        $sourceCriterionConfig = (new SourceCriterion())
            ->setIpStrategyDepth($ipStrategyDepth)
            ->setRequestHeaderName($requestHeaderName)
            ->setRequestHost($requestHost)
            ->addIpStrategyExcludedIP($ip1)
            ->addIpStrategyExcludedIP($ip2);

        return (new InFlightReqConfig())
            ->setAmount($amount)
            ->setSourceCriterion($sourceCriterionConfig);
    }

    private function getMiddleware13Config(): PassTLSClientCertConfig
    {
        $subject = (new CertificateConfig())
            ->setCommonName(true)
            ->setCountry(true)
            ->setDomainComponent(true)
            ->setLocality(true)
            ->setOrganization(true)
            ->setProvince(true)
            ->setSerialNumber(true)
        ;

        $issuer = (new CertificateConfig())
            ->setCommonName(true)
            ->setCountry(true)
            ->setDomainComponent(true)
            ->setLocality(true)
            ->setOrganization(true)
            ->setProvince(true)
            ->setSerialNumber(true)
        ;

        return (new PassTLSClientCertConfig())
            ->setPem(true)
            ->setInfoNotAfter(true)
            ->setInfoNotBefore(true)
            ->setInfoSans(true)
            ->setInfoSerialNumber(true)
            ->setInfoSubject($subject)
            ->setInfoIssuer($issuer);
    }

    private function getMiddleware15Config(): RateLimitConfig
    {
        $ip1 = 'foobar';
        $ip2 = 'foobar';
        $average = 42;
        $period = '42';
        $burst = 42;
        $requestHeaderName = 'foobar';
        $requestHost = true;
        $ipStrategyDepth = 42;

        $sourceCriterionConfig = (new SourceCriterion())
            ->setRequestHeaderName($requestHeaderName)
            ->setRequestHost($requestHost)
            ->setIpStrategyDepth($ipStrategyDepth)
            ->addIpStrategyExcludedIP($ip1)
            ->addIpStrategyExcludedIP($ip2);

        return (new RateLimitConfig())
            ->setAverage($average)
            ->setPeriod($period)
            ->setBurst($burst)
            ->setSourceCriterion($sourceCriterionConfig);
    }

    private function getMiddleware16Config(): RedirectRegexConfig
    {
        $regex = 'foobar';
        $permanent = true;
        $replacement = 'foobar';
        return (new RedirectRegexConfig())
            ->setRegex($regex)
            ->setReplacement($replacement)
            ->setPermanent($permanent);
    }

    private function getMiddleware17Config(): RedirectSchemeConfig
    {
        $scheme = 'foobar';
        $permanent = true;
        $port = 'foobar';
        return (new RedirectSchemeConfig())
            ->setScheme($scheme)
            ->setPermanent($permanent)
            ->setPort($port);
    }

    private function getMiddleware18Config(): ReplacePathConfig
    {
        $path = 'foobar';
        return (new ReplacePathConfig())
            ->setPath($path);
    }

    private function getMiddleware19Config(): ReplacePathRegexConfig
    {
        $regex = 'foobar';
        $replacement = 'foobar';
        return (new ReplacePathRegexConfig())
            ->setRegex($regex)
            ->setReplacement($replacement);
    }

    private function getMiddleware20Config(): RetryConfig
    {
        return (new RetryConfig())
            ->setAttempts(42);
    }

    private function getMiddleware21Config(): StripPrefixConfig
    {
        return (new StripPrefixConfig())
            ->setForceSlash(true)
            ->addPrefixes('foobar')
            ->addPrefixes('foobar');
    }

    private function getMiddleware22Config(): StripPrefixRegexConfig
    {
        return ( new StripPrefixRegexConfig() )
            ->addRegex('foobar')
            ->addRegex('foobar');
    }

    protected function validateArray(array $source, array $target, string $message = '')
    {

        foreach ($source as $arrayKey => $arrayValue) {
            $currentMessage = implode(' -> ', [$message, $arrayKey]);
            if (!isset($target[$arrayKey])) {
                var_dump(array_keys($target));
            }
            $this->assertArrayHasKey($arrayKey, $target, $currentMessage);

            switch (gettype($arrayValue)) {
                case 'array':
                    $this->validateArray($arrayValue, $target[$arrayKey], $currentMessage);
                    break;
                case 'string':
                case 'integer':
                case 'boolean':
                case 'double':
                case 'float':
                    $this->assertEquals($arrayValue, $target[$arrayKey], $currentMessage);
                    break;
                default:
                    var_dump([
                        'type' => gettype($arrayValue),
                        'source' => $source,
                        'target' => $target
                    ]);
                    $this->assertTrue(false);
                    break;
            }
        }
    }
}
