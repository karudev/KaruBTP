<?php

namespace Karudev\PersonBundle\Entity\Persons;

use Doctrine\ORM\Mapping as ORM;
use Karudev\PersonBundle\Entity\BasePerson;


/**
 * Person
 * @ORM\Table(name="customer")
 * @ORM\Entity()
 */
class Customer extends BasePerson
{
    const PATH_ICO = '/bundles/karudevperson/images/ico/customer.png';
   
    
    public function getPathIcoType() {
       return self::PATH_ICO;
    }

}
