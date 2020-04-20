<?php

declare(strict_types=1);

namespace Vdlp\Hashids\Classes;

use Hashids\Hashids as HashidsBase;
use Hashids\HashidsException;

class HashidsFactory
{
    /**
     * @throws HashidsException
     */
    public function make(array $config): Hashids
    {
        return $this->getInstance($this->getConfig($config));
    }

    protected function getConfig(array $config): array
    {
        return [
            'salt' => $config['salt'] ?? '',
            'length' => $config['length'] ?? 0,
            'alphabet' => $config['alphabet'] ?? 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',
        ];
    }

    /**
     * @throws HashidsException
     */
    protected function getInstance(array $config): Hashids
    {
        return new Hashids(new HashidsBase($config['salt'], $config['length'], $config['alphabet']));
    }
}
