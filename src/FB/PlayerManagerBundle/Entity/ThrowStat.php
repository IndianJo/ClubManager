<?php

namespace FB\PlayerManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BackThrow
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
     * @ORM\Column(name="distance", type="integer")
     */
    private $distance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="testDate", type="date")
     */
    private $testDate;


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
     * Set distance
     *
     * @param integer $distance
     * @return ThrowStat
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return integer 
     */
    public function getDistance()
    {
        return $this->distance;
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
}
