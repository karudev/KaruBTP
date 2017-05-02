<?php

namespace Karudev\PersonBundle\Controller\Persons;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Karudev\PersonBundle\Form\SearchPersonType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Karudev\PersonBundle\Entity\BasePerson;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Karudev\PersonBundle\Form\PersonType;

class PersonController extends Controller
{
    /**
     * @Template()
     * @Method({"GET"})
     * @param Person $person
     * @return type
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $searchForm = $this->createForm(SearchPersonType::class);

        $persons = $em->getRepository('KarudevPersonBundle:Persons\Person')->findBy([]);

        return [
            'persons' => $persons,
            'searchForm' => $searchForm->createView()
        ];
    }
    
    /**
     * @Template()
     * @Method({"GET"})
     * @param Person $person
     * @return type
     */
    public function showAction(BasePerson $person)
    {
       
        return [
            'person' => $person
        ];
    }
    
    /**
     * @Template()
     * @Method({"GET"})
     * @param Person $person
     * @return type
     */
    public function editAction(BasePerson $person)
    {
        $form = $this->createForm(PersonType::class, $person);
        
        
        return [
            'person' => $person,
            'form' => $form->createView()
        ];
    }
    
    public function searchAction(Request $request){
        
      $data = $request->get('search_person');
      
      dump($data['search']);
      return new JsonResponse();  
    }
    
}
