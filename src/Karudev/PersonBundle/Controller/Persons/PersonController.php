<?php

namespace Karudev\PersonBundle\Controller\Persons;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Karudev\PersonBundle\Form\SearchPersonType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class PersonController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $searchForm = $this->createForm(SearchPersonType::class);

        $persons = $em->getRepository('KarudevPersonBundle:Persons\Person')->findBy([]);

        return $this->render('KarudevPersonBundle:Persons/Person:index.html.twig', array(
            'persons' => $persons,
            'searchForm' => $searchForm->createView()
        ));
    }
    
    public function searchAction(Request $request){
        
      $data = $request->get('search_person');
      
      dump($data['search']);
      return new JsonResponse();  
    }
    
}
