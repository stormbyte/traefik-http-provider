<?php

require_once __DIR__ . '/vendor/autoload.php';


$config = new \Traefik\Config();
### Magento
$config->setHttpService('magento_service', 'http://magento:80');
$config->setHttpRouter('magento_router', 'Host(`magento.test`)', 'magento_service')
    ->setEntryPoints(['http', 'https']);

$config->setTcpService('magento_database_service', 'magento_db:3306');
$config->setTcpRouter('magento_database_router', 'HostSNI(`magento.test`)', 'magento_database_service')
    ->setEntryPoints(['database']);
### Magento

### Magento V2
$config->setHttpService('magentov2_service', 'http://magentov2:80');
$config->setHttpRouter('magentov2_router', 'Host(`magento-v2.test`)', 'magentov2_service')
    ->setEntryPoints(['http', 'https']);

$config->setTcpService('magentov2_database_service', 'magentov2_db:3306');
$config->setTcpRouter('magentov2_database_router', 'HostSNI(`magento-v2.test`)', 'magentov2_database_service')
    ->setEntryPoints(['database']);
### Magento V2

### Joomla
$config->setHttpService('joomla_service', 'http://joomla:80');
$config->setHttpRouter('joomla_router', 'Host(`joomla.test`)', 'joomla_service')
    ->setEntryPoints(['http', 'https']);

$config->setTcpService('joomla_database_service', 'joomla_db:3306');
$config->setTcpRouter('joomla_database_router', 'HostSNI(`joomla.test`)', 'joomla_database_service')
    ->setEntryPoints(['database']);
### Joomla
echo $config->getJsonConfig();
