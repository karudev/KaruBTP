<?php

namespace Karudev\PersonBundle\Entity\Persons;

use Doctrine\ORM\Mapping as ORM;
use Karudev\PersonBundle\Entity\BasePerson;


/**
 * Person
 * @ORM\Table(name="prospect")
 * @ORM\Entity()
 */
class Prospect extends BasePerson
{
    
    const PATH_ICO = '/bundles/karudevperson/images/ico/prospect.png';

    public function getPathIcoType() {
       return self::PATH_ICO;
    }
}
