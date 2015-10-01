<?php

namespace FB\PlayerManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * throwDistance
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FB\PlayerManagerBundle\Entity\ThrowStatRepository")
 */
class ThrowStat
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
     * @ORM\Column(name="backDistance", type="integer")
     */
    private $backDistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="sideDistance", type="integer")
     */

    private $sideDistance;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="testDate", type="date")
     */
    private $testDate;

    /**
     * @ORM\ManyToOne(targetEntity="FB\PlayerManagerBundle\Entity\Player")
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
     * Set backDistance
     *
     * @param integer $backDistance
     * @return ThrowStat
     */
    public function setBackDistance($backDistance)
    {
        $this->backDistance = $backDistance;

        return $this;
    }

    /**
     * Get backDistance
     *
     * @return integer 
     */
    public function getBackDistance()
    {
        return $this->backDistance;
    }

    /**
     * Set testDate
     *
     * @param \DateTime $testDate
     * @return ThrowStat
     */
    public function setTestDate($testDate)
    {
        $this->testDate = $testDate;

        return $this;
    }

    /**
     * Get testDate
     *
     * @return \DateTime 
     */
    public function getTestDate()
    {
        return $this->testDate;
    }

    /**
     * Set sideDistance
     *
     * @param integer $sideDistance
     * @return ThrowStat
     */
    public function setSideDistance($sideDistance)
    {
        $this->sideDistance = $sideDistance;

        return $this;
    }

    /**
     * Get sideDistance
     *
     * @return integer 
     */
    public function getSideDistance()
    {
        return $this->sideDistance;
    }

    /**
     * Set player
     *
     * @param \FB\PlayerManagerBundle\Entity\Player $player
     * @return ThrowStat
     */
    public function setPlayer(\FB\PlayerManagerBundle\Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \FB\PlayerManagerBundle\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }
}
