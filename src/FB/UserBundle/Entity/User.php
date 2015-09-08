<?php

namespace FB\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
}
