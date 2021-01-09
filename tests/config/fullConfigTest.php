<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class fullConfigTest extends TestCase
{
    protected static string $jsonValidation;

    public static function setUpBeforeClass(): void
    {
        self::$jsonValidation = file_get_contents(dirname(__FILE__) . '/fullConfig.json');
    }

    public function testFullConfig()
    {
        $config = new \Traefik\Config();

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

        $config->setMiddleWare('Middleware22', new \Traefik\Middleware\Stripprefixregex(['regex' => ['foobar', 'foobar']]));
        $config->setMiddleWare('Middleware00', new \Traefik\Middleware\Addprefix(['prefix' => 'foobar']));
        $config->setMiddleWare('Middleware01', new \Traefik\Middleware\Basicauth(['removeHeader' => true, 'realm' => 'foobar', 'usersFile' => 'foobar', 'headerField' => 'foobar', 'users' => ['foobar', 'foobar']]));
        $config->setMiddleWare('Middleware02', new \Traefik\Middleware\Buffering(['memRequestBodyBytes' => 42, 'maxRequestBodyBytes' => 42, 'memResponseBodyBytes' => 42, 'maxResponseBodyBytes' => 42, 'retryExpression' => 'foobar']));
        $config->setMiddleWare('Middleware03', new \Traefik\Middleware\Chain(['middlewares' => ['foobar', 'foobar']]));
        $config->setMiddleWare('Middleware06', new \Traefik\Middleware\Contenttype(['autoDetect' => true]));
        $config->setMiddleWare('Middleware08', new \Traefik\Middleware\Errorpage(['status' => ['foobar', 'foobar'], 'query' => 'foobar', 'service' => 'foobar']));
        $config->setMiddleWare('Middleware09', new \Traefik\Middleware\Forwardauth(['tls' => ['cert' => 'foobar', 'ca' => 'foobar', 'caOptional' => true, 'insecureSkipVerify' => true, 'key' => 'foobar'], 'trustForwardHeader' => true, 'authResponseHeaders' => ['foobar', 'foobar'], 'address' => 'foobar']));
        $config->setMiddleWare('Middleware19', new \Traefik\Middleware\Replacepathregex(['regex' => 'foobar', 'replacement' => 'foobar']));
        $config->setMiddleWare('Middleware18', new \Traefik\Middleware\Replacepath(['path' => 'foobar']));
        $config->setMiddleWare('Middleware17', new \Traefik\Middleware\Redirectscheme(['scheme' => 'foobar', 'permanent' => true, 'port' => 'foobar']));
        $config->setMiddleWare('Middleware16', new \Traefik\Middleware\Redirectregex(['regex' => 'foobar', 'permanent' => true, 'replacement' => 'foobar']));
        $config->setMiddleWare('Middleware15', new \Traefik\Middleware\Ratelimit(['average' => 42, 'burst' => 42, 'period' => 42, 'sourceCriterion' => ['ipStrategy' => ['depth' => 42, 'excludedIPs' => ['foobar', 'foobar']], 'requestHeaderName' => 'foobar', 'requestHost' => true]]));
        $config->setMiddleWare('Middleware21', new \Traefik\Middleware\Stripprefix(['prefixes' => ['foobar', 'foobar'], 'forceSlash' => true]));
        $config->setMiddleWare('Middleware13', new \Traefik\Middleware\Passtlsclientcert(['info' => ['sans' => true, 'notBefore' => true, 'issuer' => ['province' => true, 'organization' => true, 'domainComponent' => true, 'locality' => true, 'country' => true, 'serialNumber' => true, 'commonName' => true], 'serialNumber' => true, 'subject' => ['province' => true, 'organization' => true, 'domainComponent' => true, 'locality' => true, 'country' => true, 'serialNumber' => true, 'commonName' => true], 'notAfter' => true], 'pem' => true]));
        $config->setMiddleWare('Middleware12', new \Traefik\Middleware\Inflightreq(['amount' => 42, 'sourceCriterion' => ['ipStrategy' => ['depth' => 42, 'excludedIPs' => ['foobar', 'foobar']], 'requestHeaderName' => 'foobar', 'requestHost' => true]]));
        $config->setMiddleWare('Middleware11', new \Traefik\Middleware\Ipwhitelist(['ipStrategy' => ['depth' => 42, 'excludedIPs' => ['foobar', 'foobar']], 'sourceRange' => ['foobar', 'foobar']]));
        $config->setMiddleWare('Middleware10', new \Traefik\Middleware\Headers(['stsIncludeSubdomains' => true, 'addVaryHeader' => true, 'customRequestHeaders' => ['name0' => 'foobar', 'name1' => 'foobar'], 'accessControlAllowOriginList' => ['foobar', 'foobar'], 'sslProxyHeaders' => ['name0' => 'foobar', 'name1' => 'foobar'], 'referrerPolicy' => 'foobar', 'accessControlAllowMethods' => ['foobar', 'foobar'], 'accessControlAllowOrigin' => 'foobar', 'sslTemporaryRedirect' => true, 'contentTypeNosniff' => true, 'stsSeconds' => 42, 'sslRedirect' => true, 'accessControlAllowCredentials' => true, 'sslHost' => 'foobar', 'browserXssFilter' => true, 'contentSecurityPolicy' => 'foobar', 'hostsProxyHeaders' => ['foobar', 'foobar'], 'accessControlAllowHeaders' => ['foobar', 'foobar'], 'sslForceHost' => true, 'customResponseHeaders' => ['name0' => 'foobar', 'name1' => 'foobar'], 'forceSTSHeader' => true, 'publicKey' => 'foobar', 'frameDeny' => true, 'allowedHosts' => ['foobar', 'foobar'], 'isDevelopment' => true, 'customBrowserXSSValue' => 'foobar', 'accessControlMaxAge' => 42, 'customFrameOptionsValue' => 'foobar', 'stsPreload' => true, 'accessControlExposeHeaders' => ['foobar', 'foobar'], 'featurePolicy' => 'foobar']));
        $config->setMiddleWare('Middleware04', new \Traefik\Middleware\Circuitbreaker(['expression' => 'foobar']));
        $config->setMiddleWare('Middleware05', new \Traefik\Middleware\Compress(['excludedContentTypes' => ['foobar', 'foobar']]));
        $config->setMiddleWare('Middleware07', new \Traefik\Middleware\Digestauth(['removeHeader' => true, 'realm' => 'foobar', 'usersFile' => 'foobar', 'headerField' => 'foobar', 'users' => ['foobar', 'foobar']]));
        $config->setMiddleWare('Middleware20', new \Traefik\Middleware\Retry(['attempts' => 42]));

        $phpConfig = json_decode($config->getJsonConfig(), true);
        $jsonConfig = json_decode(self::$jsonValidation, true);

        $this->validateArray($jsonConfig, $phpConfig);
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
                    $this->validateArray($source[$arrayKey], $target[$arrayKey], $currentMessage);
                    break;
                case 'string':
                case 'integer':
                case 'boolean':
                    $this->assertEquals($source[$arrayKey], $target[$arrayKey], $currentMessage);
                    break;
                default:
                    $this->assertTrue(false);
                    var_dump([
                        'type' => gettype($arrayValue),
                        'source' => $source,
                        'target' => $target
                    ]);
                    break;
            }
        }
    }
}
