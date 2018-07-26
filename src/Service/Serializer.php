<?php

namespace App\Service;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

/**
 * Class Serializer
 *
 * @package App\Services
 */
class Serializer
{

    /**
     *
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * Serializer constructor.
     *
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Data serializing via JMS serializer.
     *
     * @param array|object $data
     * @param array        $groups
     *
     * @return string JSON string
     */
    public function serialize($data, array $groups = []): string
    {
        $context = new SerializationContext();
        $context->setSerializeNull(true);
        if (\count($groups)) {
            $context->setGroups($groups);
        }

        return $this->serializer->serialize($data, 'json', $context);
    }

    /**
     *
     * @param string $data
     * @param string $type
     *
     * @return array|object
     */
    public function deserialize($data, $type)
    {

        return $this->serializer->deserialize($data, $type, 'json');
    }

    /**
     *
     * @param array|object $data
     * @param array        $groups
     *
     * @return array
     */
    public function toArray($data, array $groups = []): array
    {
        $serializer = SerializerBuilder::create()->build();

        $context = new SerializationContext();
        $context->setSerializeNull(true);
        if (\count($groups)) {
            $context->setGroups($groups);
        }

        return $serializer->toArray($data, $context);
    }
}
