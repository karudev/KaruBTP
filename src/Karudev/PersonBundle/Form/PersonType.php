<?php

namespace Karudev\PersonBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PersonType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           // ->add('file',FileType::class,['label' => 'Photo'])
            ->add('gender', ChoiceType::class, array(
                'label' => 'Civilité',
                'choices' => array(
                    'Homme' => 'M',
                    'Femme' => 'F'
                ),
                'required'    => true,
                'placeholder' => '-- Civilité --',
                'empty_data'  => null
            ))
            ->add('firstname',TextType::class,['label' => 'Prénom'])
            ->add('lastname',TextType::class,['label' => 'Nom'])
            ->add('email',EmailType::class,['label' => 'Email'])
            ->add('mainPhone',TextType::class,['label' => 'Téléphone principal'])
            ->add('secondaryPhone',TextType::class,['label' => 'Téléphone secondaire'])
            ->add('address',TextType::class,['label' => 'Adresse (rue)'])
            ->add('addressComplement')
            ->add('zipCode',TextType::class,['label' => 'Code postal'])
            ->add('city',TextType::class,['label' => 'Ville'])
            //->add('district')
            ->add('country')
            ->add('birthday', BirthdayType::class, array(
               // 'year'=> range(1900,(date('Y')-10)),
                //'widget' => 'choice',

                // do not render as type="date", to avoid HTML5 date pickers
                //'html5' => false,

                // add a class that can be selected in JavaScript
                //'attr' => ['class' => 'js-datepicker']
))
             ->add('submit',SubmitType::class);

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Karudev\PersonBundle\Entity\BasePerson'
        ));
    }
}
