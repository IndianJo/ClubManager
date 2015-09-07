<?php
// src\FB\PlayerManagerBundle\Entity\Player.php

namespace FB\PlayerManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FB\SetManagerBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Player
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FB\PlayerManagerBundle\Entity\PlayerRepository")
 */
class Player
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
     * @ORM\Column(name="firstname", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="phonenumber", type="string", length=10)
     * @Assert\Length(min=10, max=10, exactMessage="Le numéro de téléphone doit faire {{ limit }} caractères")
     */
    private $phonenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var integer
     *
     * @ORM\Column(name="streetnumber", type="integer")
     */
    private $streetnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="CP", type="integer")
     */
    private $cP;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="FB\SetManagerBundle\Entity\GameSet", mappedBy="player")
     */
    private $GameSets;

    public function __construct()
    {
        $this->setPhonenumber(0000000000);
        $this->setStreet("inconnu");
        $this->setStreetnumber(00);
        $this->setCP(25000);
        $this->setCity("Besancon");
        $this->setEmail("");
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
     * Set firstname
     *
     * @param string $firstname
     * @return Player
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Player
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set phonenumber
     *
     * @param integer $phonenumber
     * @return Player
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return integer 
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Player
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set streetnumber
     *
     * @param integer $streetnumber
     * @return Player
     */
    public function setStreetnumber($streetnumber)
    {
        $this->streetnumber = $streetnumber;

        return $this;
    }

    /**
     * Get streetnumber
     *
     * @return integer 
     */
    public function getStreetnumber()
    {
        return $this->streetnumber;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Player
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set cP
     *
     * @param integer $cP
     * @return Player
     */
    public function setCP($cP)
    {
        $this->cP = $cP;

        return $this;
    }

    /**
     * Get cP
     *
     * @return integer
     */
    public function getCP()
    {
        return $this->cP;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Player
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add GameSets
     *
     * @param Entity\GameSet $gameSet
     * @return Player
     */
    public function addGameSet(Entity\GameSet $gameSet)
    {
        $this->GameSets[] = $gameSet;

        // on lie le joueur au set
        $gameSet->setPlayer($this);

        return $this;
    }

    /**
     * Remove GameSets
     *
     * @param Entity\GameSet $gameSet
     */
    public function removeGameSet(Entity\GameSet $gameSet)
    {
        $this->GameSets->removeElement($gameSet);

        $gameSet->setPlayer(null);
    }

    /**
     * Get GameSets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGameSets()
    {
        return $this->GameSets;
    }
}
