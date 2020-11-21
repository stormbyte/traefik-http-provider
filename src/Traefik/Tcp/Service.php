<?php

namespace Traefik\Tcp;

use Traefik\configObject;
use Traefik\Transport\TcpTrait;
use Traefik\Type\ServiceTrait;

class Service implements configObject
{
	use TcpTrait;
	use ServiceTrait;

	const LOADBALANCER = 'loadBalancer';
	const MIRRORING = 'mirroring';
	const WEIGHTED = 'weighted';

	protected string $name;
	protected string $type;
	protected int $terminationDelay;
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

	public function setTerminationDelay( int $delay )
	{
		$this->terminationDelay = $delay;
		return $this;
	}

	public function getTerminationDelay()
	{
		return $this->terminationDelay;
	}

	public function addServer( string $url )
	{
		$this->servers[] = [
			'address' => $url
		];
		return $this;
	}

	public function getServers()
	{
		return $this->servers;
	}

	public function getData(): array
	{
		$data = [
			'servers' => $this->getServers()
		];
		if( isset( $this->terminationDelay ) ){
			$data['terminationDelay'] = $this->getTerminationDelay();
		}

		return [ $this->getType() => $data ];
	}
}