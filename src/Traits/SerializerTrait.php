<?php

namespace App\Traits;

use App\Services\Serializer;

/**
 * Trait SerializerTrait
 *
 * @package App\Traits
 */
trait SerializerTrait
{

    /**
     *
     * @var Serializer
     */
    private $s;

    /**
     *
     * @param    Serializer $serializer
     * @required
     */
    public function setSerializer(Serializer $serializer): void
    {
        $this->s = $serializer;
    }
}
