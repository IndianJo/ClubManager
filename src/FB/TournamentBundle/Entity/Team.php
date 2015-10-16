<?php

namespace FB\TournamentBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FB\SessionManagerBundle\Entity\Session;
use Symfony\Component\Validator\Constraints as Assert;
use FB\PlayerManagerBundle\Entity\Player;

/**
 * Team
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FB\TournamentBundle\Entity\TeamRepository")
 */
class Team
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="FB\PlayerManagerBundle\Entity\Player", inversedBy="teams", cascade={"persist"})
     */
    private $players;

    /**
     * @ORM\ManyToOne(targetEntity="FB\TournamentBundle\Entity\Tournament", inversedBy="teams", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $tournament;

    /**
     * @ORM\ManyToOne(targetEntity="FB\SessionManagerBundle\Entity\Session", inversedBy="teams", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $session;

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
     * Set name
     *
     * @param string $name
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->players = new ArrayCollection();
    }

    /**
     * Add players
     *
     * @param Player $player
     * @return Tournament
     */
    public function addPlayer(Player $player)
    {
        $this->players[] = $player;

        return $this;
    }

    /**
     * Remove players
     *
     * @param Player $player
     */
    public function removePlayer(Player $player)
    {
        $this->players->removeElement($player);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlayers()
    {
        return $this->players;
    }


    /**
     * Set tournament
     *
     * @param Tournament $tournament
     * @return Team
     */
    public function setTournament(Tournament $tournament)
    {
        $this->tournament = $tournament;

        return $this;
    }

    /**
     * Get tournament
     *
     * @return Tournament
     */
    public function getTournament()
    {
        return $this->tournament;
    }

    /**
     * Set session
     *
     * @param Session $session
     * @return Team
     */
    public function setSession(Session $session = null)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return Session
     */
    public function getSession()
    {
        return $this->session;
    }
}
