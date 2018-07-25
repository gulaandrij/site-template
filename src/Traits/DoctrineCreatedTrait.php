<?php

namespace App\Traits;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait DoctrineCreatedUpdatedTrait
 *
 * @package App\Traits
 */
trait DoctrineCreatedTrait
{

    /**
     *
     * @var \DateTime $createdAt
     *
     * @ORM\Column(type="datetime", name="created_at", nullable=false)
     * @JMS\Groups({"created_at",   "dates"})
     */
    protected $createdAt;

    /**
     * Gets triggered only on insert
     *
     * @ORM\PrePersist()
     */
    public function onPrePersist(): void
    {
        if (!$this->createdAt) {
            $this->createdAt = new \DateTime('now');
        }
    }

    /**
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }
}
