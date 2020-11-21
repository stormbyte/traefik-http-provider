<?php

namespace Traefik\Tcp;

use Traefik\configObject;
use Traefik\Transport\TcpTrait;
use Traefik\Type\RouterTrait;

class Router implements configObject
{
	use TcpTrait;
	use RouterTrait;

	protected string $name;
	protected string $rule;
	protected array $entryPoints;
	protected bool $tls = false;
	protected int $priority;
	protected array $middlewares;

	public function setPriority( int $priority)
	{
		$this->priority = $priority;
		return $this;
	}

	public function getPriority()
	{
		return $this->priority;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	public function getRule(){
		return $this->rule;
	}

	public function setRule($rule)
	{
		$this->rule = $rule;
		return $this;
	}

	public function getService(){
		return $this->serviceName;
	}

	public function setService($serviceName)
	{
		$this->serviceName = $serviceName;
		return $this;
	}

	public function getTls(){
		return $this->tls;
	}

	public function setTls(bool $tls)
	{
		$this->tls = $tls;
		return $this;
	}

	public function setEntryPoints( array $entryPoints)
	{
		$this->entryPoints = $entryPoints;
		return $this;
	}

	public function getEntryPoints()
	{
		return $this->entryPoints;
	}

	public function setMiddlewares( array $middlewares)
	{
		$this->middlewares = $middlewares;
		return $this;
	}

	public function getData(): array
	{
		$routerData = [
			'entryPoints' => $this->getEntryPoints(),
			'service' => $this->getService(),
			'rule' => $this->getRule(),
			
		];
		if( $this->tls ){
			$routerData['tls'] = [
				'passthrough' => 'true'
			];
		}

		if( isset( $this->priority ) ){
			$routerData['priority'] = $this->priority;
		}

		if( isset( $this->middlewares ) ){
			$routerData['middlewares'] = $this->middlewares;
		}

		return $routerData;
	}

}
