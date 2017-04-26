<?php

namespace Karudev\PersonBundle\Entity\Persons;

use Doctrine\ORM\Mapping as ORM;
use Karudev\PersonBundle\Entity\BasePerson;


/**
 * Person
 * @ORM\Table(name="person")
 * @ORM\Entity()
 */
class Person extends BasePerson
{
    
}
