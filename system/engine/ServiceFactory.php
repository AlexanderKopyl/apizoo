<?php

namespace System\Engine;

use System\Services\ServiceInterface;

final class ServiceFactory
{
    protected array $services;

    /**
     * @param string $factoryName
     * @return ServiceInterface
     * @throws \Exception
     */
    public function createService(string $factoryName): ServiceInterface
    {
        if(isset($this->services[$factoryName])){
            return $this->services[$factoryName];
        }

        throw new \Exception("Service [$factoryName] doesn't exist");
    }

    /**
     * @param string $factoryName
     * @param ServiceInterface $service
     * @return ServiceInterface
     */
    public function setService(string $factoryName, ServiceInterface $service): ServiceInterface
    {
        return $this->services[$factoryName] = $service;
    }
}
