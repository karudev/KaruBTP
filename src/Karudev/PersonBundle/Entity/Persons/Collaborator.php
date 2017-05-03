<?php

namespace Karudev\PersonBundle\Entity\Persons;

use Doctrine\ORM\Mapping as ORM;
use Karudev\PersonBundle\Entity\BasePerson;


/**
 * Person
 * @ORM\Table(name="collaborator")
 * @ORM\Entity()
 */
class Collaborator extends BasePerson
{
    const UNIT_PRICE_HOUR = 1;
    const UNIT_PRICE_M2 = 2;
    const PATH_ICO = '/bundles/karudevperson/images/ico/collaborator.png';
    
    /**
     *
     * @var float
     * @ORM\Column(name="price", type="float", nullable=true)
     */
    private $price = 0.00;
    
    /**
     *
     * @var type 
     * @ORM\Column(name="unit_price_id", type="integer")
     */
    private $unitPriceId = null;

    /**
     * Set price
     *
     * @param float $price
     *
     * @return ServiceProvider
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set unitPriceId
     *
     * @param integer $unitPriceId
     *
     * @return ServiceProvider
     */
    public function setUnitPriceId($unitPriceId)
    {
        $this->unitPriceId = $unitPriceId;

        return $this;
    }

    /**
     * Get unitPriceId
     *
     * @return integer
     */
    public function getUnitPriceId()
    {
        return $this->unitPriceId;
    }

    public function getPathIcoType() {
       return self::PATH_ICO;
    }

}
