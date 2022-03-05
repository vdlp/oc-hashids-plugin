<?php

declare(strict_types=1);

namespace Vdlp\Hashids\Classes;

use Hashids\Hashids as HashidsHelper;
use Hashids\HashidsInterface;

class Hashids implements HashidsInterface
{
    private HashidsHelper $hashids;

    public function __construct(HashidsHelper $hashids)
    {
        $this->hashids = $hashids;
    }

    /**
     * @inheritDoc
     */
    public function encode(...$numbers): string
    {
        return $this->hashids->encode($numbers);
    }

    /**
     * @inheritDoc
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
     * @inheritDoc
     */
    public function encodeHex($str): string
    {
        return $this->hashids->encodeHex($str);
    }

    /**
     * @inheritDoc
     */
    public function decodeHex($hash): string
    {
        return $this->hashids->decodeHex($hash);
    }
}
