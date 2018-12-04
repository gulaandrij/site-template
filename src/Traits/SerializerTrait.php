<?php

namespace App\Traits;

use App\Service\Serializer;

/**
 * Trait SerializerTrait.
 */
trait SerializerTrait
{
    /**
     * @var Serializer
     */
    private $s;

    /**
     * @param Serializer $serializer
     *
     * @required
     */
    public function setSerializer(Serializer $serializer): void
    {
        $this->s = $serializer;
    }
}
