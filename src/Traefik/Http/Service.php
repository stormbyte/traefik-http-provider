<?php

namespace Traefik\Http;

use Traefik\configObject;
use Traefik\Transport\HttpTrait;
use Traefik\Type\ServiceTrait;

class Service implements configObject
{
	use HttpTrait;
	use ServiceTrait;

	const LOADBALANCER = 'loadBalancer';
	const MIRRORING = 'mirroring';
	const WEIGHTED = 'weighted';

	protected string $name;
	protected string $type;
	protected bool $passHostHeader = false;
	protected array $servers = [];

	public function setName( string $name )
	{
		$this->name = $name;
		return $this;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setType( string $type )
	{
		$this->type = $type;
		return $this;
	}

	public function getType()
	{
		return $this->type;
	}

	public function setPassHostHeader( bool $status )
	{
		$this->passHostHeader = $status;
		return $this;
	}

	public function getPassHostHeader()
	{
		return $this->passHostHeader;
	}

	public function addServer( string $url )
	{
		$this->servers[] = [
			'url' => $url
		];
		return $this;
	}

	public function getServers()
	{
		return $this->servers;
	}

	public function getData(): array
	{
		return [
			$this->getType() => [
				'passHostHeader' => $this->getPassHostHeader(),
				'servers' => $this->getServers()
			]
		];
	}
}