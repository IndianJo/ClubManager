<?php

namespace FB\SessionManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FB\TournamentBundle\Entity\Team;

/**
 * Session
 *
 * @ORM\Table()
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
     * @ORM\Column(name="trainingStart", type="datetime")
     */
    private $trainingStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="trainingEnd", type="datetime")
     */
    private $trainingEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="surface", type="string", length=255)
     */
    private $surface;

    /**
     * @ORM\OneToMany(targetEntity="FB\TournamentBundle\Entity\Team", mappedBy="session", cascade={"persist", "remove"})
     */
    private $teams;

    public function __construct()
    {
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
     * Set surface
     *
     * @param string $surface
     * @return Session
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get surface
     *
     * @return string 
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Set trainingStart
     *
     * @param \DateTime $trainingStart
     * @return Session
     */
    public function setTrainingStart($trainingStart)
    {
        $this->trainingStart = $trainingStart;

        return $this;
    }

    /**
     * Get trainingStart
     *
     * @return \DateTime 
     */
    public function getTrainingStart()
    {
        return $this->trainingStart;
    }

    /**
     * Set trainingEnd
     *
     * @param \DateTime $trainingEnd
     * @return Session
     */
    public function setTrainingEnd($trainingEnd)
    {
        $this->trainingEnd = $trainingEnd;

        return $this;
    }

    /**
     * Get trainingEnd
     *
     * @return \DateTime 
     */
    public function getTrainingEnd()
    {
        return $this->trainingEnd;
    }

    /**
     * Add team
     *
     * @param Team $team
     * @return Session
     */
    public function addTeam(Team $team)
    {
        $this->teams[] = $team;
        $team->setSession($this);
        return $this;
    }

    /**
     * Remove team
     *
     * @param Team $team
     */
    public function removeTeam(Team $team)
    {
        $this->teams->removeElement($team);
    }

    /**
     * Get teams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeams()
    {
        return $this->teams;
    }
}
