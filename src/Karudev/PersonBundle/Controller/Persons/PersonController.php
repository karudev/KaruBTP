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
     * @param Person $person
     * @return type
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $persons = $em->getRepository('KarudevPersonBundle:Persons\Person')->findBy([]);

        return [
            'persons' => $persons
        ];
    }
    
    /**
     * @Template()
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
     * @param Person $person
     * @return type
     */
    public function editAction(Request $request , BasePerson $person)
    {
        $form = $this->createForm(PersonType::class, $person,[
            'method' => 'POST',
            'action' => $this->generateUrl('karudev_persons_person_edit',['person' => $person->getId() ])
        ]);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
        
                $em = $this->getDoctrine()->getManager();
                $em->persist($person);
                $em->flush();
            }else{
               // dump($form->getErrors()); die();
            }
            
        }


        return [
            'person' => $person,
            'form' => $form->createView()
        ];
    }
    
    
}
