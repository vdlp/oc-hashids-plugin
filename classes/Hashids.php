<?php

declare(strict_types=1);

namespace Vdlp\Hashids\Classes;

use Hashids\Hashids as HashidsHelper;
use Hashids\HashidsInterface;

/**
 * Class Hashids
 *
 * @package Vdlp\Hashids\Classes
 */
class Hashids implements HashidsInterface
{
    /**
     * @var HashidsHelper
     */
    private $hashids;

    /**
     * @param HashidsHelper $hashids
     */
    public function __construct(HashidsHelper $hashids)
    {
        $this->hashids = $hashids;
    }

    /**
     * @param array $numbers
     * @return string
     */
    public function encode(...$numbers): string
    {
        return $this->hashids->encode($numbers);
    }

    /**
     * @param string $hash
     * @return int
     */
    public function decode($hash): int
    {
        $result = $this->hashids->decode($hash);
        if (array_key_exists(0, $result)) {
            return (int) $result[0];
        }

        return 0;
    }

    /**
     * @param string $str
     * @return string
     */
    public function encodeHex($str): string
    {
        return $this->hashids->encodeHex($str);
    }

    /**
     * @param string $hash
     * @return string
     */
    public function decodeHex($hash): string
    {
        return $this->hashids->decodeHex($hash);
    }
}
