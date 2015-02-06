<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Session
 *
 * @ORM\Table(name="sessions")
 * @ORM\Entity
 */
class Session
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_at", type="datetime")
     */
    private $startAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_at", type="datetime")
     */
    private $endAt;

    /**
     * @var Command[]
     *
     * @OneToMany(targetEntity="AppBundle\Entity\Command", mappedBy="session")
     */
    private $commands;


    public function __construct()
    {
        $this->commands = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set startAt
     *
     * @param DateTime $startAt
     * @return Session
     */
    public function setStartAt(DateTime $startAt)
    {
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * Get startAt
     *
     * @return DateTime
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * Set endAt
     *
     * @param DateTime $endAt
     * @return Session
     */
    public function setEndAt(DateTime $endAt)
    {
        $this->endAt = $endAt;

        return $this;
    }

    /**
     * Get endAt
     *
     * @return DateTime
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * @param Command[] $commands
     * @return $this
     */
    public function setCommands(array $commands)
    {
        $this->commands = $commands;

        return $this;
    }

    /**
     * @return Command[]
     */
    public function getCommands()
    {
        return $this->commands;
    }
}
