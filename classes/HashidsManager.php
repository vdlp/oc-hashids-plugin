<?php

declare(strict_types=1);

namespace Vdlp\Hashids\Classes;

use Hashids\HashidsException;
use Illuminate\Contracts\Config\Repository;
use InvalidArgumentException;

/**
 * Class HashidsManager
 *
 * @package Vdlp\Hashids\Classes
 *
 * @mixin Hashids
 */
class HashidsManager
{
    /**
     * @var Repository
     */
    protected $config;

    /**
     * @var HashidsFactory
     */
    protected $factory;

    /**
     * @var Hashids[]
     */
    protected $instances = [];

    /**
     * @param Repository $config
     * @param HashidsFactory $factory
     */
    public function __construct(Repository $config, HashidsFactory $factory)
    {
        $this->config = $config;
        $this->factory = $factory;
    }

    /**
     * @param string|null $name
     * @return Hashids
     * @throws InvalidArgumentException
     */
    public function instance(string $name = null): Hashids
    {
        $name = $name ?: $this->getDefaultInstance();

        if (!isset($this->instances[$name])) {
            $this->instances[$name] = $this->makeInstance($name);
        }

        return $this->instances[$name];
    }

    /**
     * @param string|null $name
     * @return Hashids
     * @throws InvalidArgumentException
     */
    public function reloadInstance(string $name = null): Hashids
    {
        $name = $name ?: $this->getDefaultInstance();

        $this->removeInstance($name);

        return $this->instance($name);
    }

    /**
     * @param string|null $name
     * @return void
     */
    public function removeInstance(string $name = null): void
    {
        $name = $name ?: $this->getDefaultInstance();
        unset($this->instances[$name]);
    }

    /**
     * @return string
     */
    public function getDefaultInstance(): string
    {
        return $this->config->get('hashids.default');
    }

    /**
     * @param string $name
     * @return void
     */
    public function setDefaultInstance(string $name): void
    {
        $this->config->set('hashids.default', $name);
    }

    /**
     * @param string|null $name
     * @return array
     * @throws InvalidArgumentException
     */
    public function getInstanceConfig(string $name = null): array
    {
        $name = $name ?: $this->getDefaultInstance();

        $configurations = $this->config->get('hashids.configurations');
        if (!isset($configurations[$name]) || !is_array($configurations[$name])) {
            throw new InvalidArgumentException("Configuration $name is not properly configured.");
        }

        $config = $configurations[$name];
        $config['name'] = $name;

        return $config;
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __call(string $method, array $parameters)
    {
        return $this->instance()->$method(...$parameters);
    }

    /**
     * @param string $name
     * @return Hashids
     * @throws InvalidArgumentException
     */
    protected function makeInstance(string $name): Hashids
    {
        $config = $this->getInstanceConfig($name);
        return $this->createInstance($config);
    }

    /**
     * @param array $config
     * @return Hashids
     * @throws HashidsException
     */
    protected function createInstance(array $config): Hashids
    {
        return $this->factory->make($config);
    }
}
