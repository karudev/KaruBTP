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
use Karudev\PersonBundle\Entity\Persons\Person;

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
     * @return type
     */
    public function newAction(Request $request)
    {
        //if ($request->getMethod() == 'GET') {
            $person = new Person();

            $form = $this->createForm(PersonType::class, $person,[
                'method' => 'POST',
                'action' => $this->generateUrl('karudev_persons_person_new')
            ]);
       // }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
        
                $em = $this->getDoctrine()->getManager();
                $em->persist($person);
                $em->flush();
                return $this->redirectToRoute('karudev_persons_person_index');
            }
            
        }


        return [
            'form' => $form->createView()
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
            }
            
        }


        return [
            'person' => $person,
            'form' => $form->createView()
        ];
    }
    
    public function deleteAction(BasePerson $person)
    {  
        /**
         * @todo Verification if we can delete this person
         */
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($person);
        $em->flush();
        
        return $this->redirectToRoute('karudev_persons_person_index');
    }
    
    
}
