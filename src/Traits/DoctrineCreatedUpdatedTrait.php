<?php

namespace App\Traits;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait DoctrineCreatedUpdatedTrait.
 */
trait DoctrineCreatedUpdatedTrait
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="created_at", nullable=false)
     * @JMS\Groups({"created_at",   "dates"})
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     * @JMS\Groups({"updated_at",     "dates"})
     */
    protected $updatedAt;

    /**
     * Gets triggered only on insert.
     *
     * @ORM\PrePersist
     */
    public function onPrePersist(): void
    {
        if (!$this->createdAt) {
            $this->createdAt = new \DateTime('now');
        }
    }

    /**
     * Gets triggered every time on update.
     *
     * @ORM\PreUpdate
     * @ORM\PrePersist
     */
    public function onPreUpdate(): void
    {
        $this->updatedAt = new \DateTime('now');
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
