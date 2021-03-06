<?php

namespace FB\SetManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FB\ClubManagerBundle\FBClubManagerBundle;
use FB\PlayerManagerBundle\Entity;
use FB\PlayerManagerBundle\FBPlayerManagerBundle;

/**
 * GameSet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FB\SetManagerBundle\Entity\GameSetRepository")
 */
class GameSet
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
     * @var integer
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=3)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=5)
     */
    private $sexe;

    /**
     * @ORM\ManyToOne(targetEntity="FB\PlayerManagerBundle\Entity\Player", inversedBy="GameSets")
     * @ORM\JoinColumn(nullable=true)
     */
    private $player;

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
     * Set number
     *
     * @param integer $number
     * @return GameSet
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return GameSet
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return GameSet
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set player
     *
     * @param Entity\Player $player
     * @return GameSet
     */
    public function setPlayer(Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return Entity\Player
     */
    public function getPlayer()
    {
        return $this->player;
    }
}
