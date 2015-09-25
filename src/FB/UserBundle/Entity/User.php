<?php

namespace FB\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FB\PlayerManagerBundle\Entity;
use Sonata\UserBundle\Entity\BaseUser;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FB\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var
     *
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="users")
     * @ORM\JoinTable(name="users_groups")
     */
    protected $groups;

    /**
     * @ORM\OneToOne(targetEntity="FB\PlayerManagerBundle\Entity\Player", inversedBy="GameSets")
     * @ORM\JoinColumn(nullable=true)
     */
    private $player;

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
