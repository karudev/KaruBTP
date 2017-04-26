<?php

namespace KarudevPersonBundle\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ServiceProviderRepositoryTest extends WebTestCase
{
    public $container;
    public $em;
    
    public function setUp()
    {
        $client = static::createClient();
        
        $this->container = $client->getContainer();
        $this->em = $this->container->get('doctrine')->getManager();
        
        $loader = $this->container->get('fidry_alice_data_fixtures.doctrine.purger_loader');

        $loader->load([
            __DIR__.'/../../Resources/fixtures/orm/ServiceProvider.yml'
            ]
        );
        
    }
    public function testPerson()
    {
       $data = $this->em->getRepository('AppBundle:Persons\ServiceProvider')->findBy(['gender' => 'H']);
       $this->assertEquals(10, count($data));
      
    }
}
