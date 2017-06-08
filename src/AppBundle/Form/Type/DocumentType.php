<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title', TextType::class)
                ->add('body', TextType::class)
                //->add('categories', TextType::class)
                ->add('categories', EntityType::class, array(
                    'class' => 'AppBundle:DocumentCategory',
                    'multiple' => true,
                    'expanded' => true,
                    'by_reference' => true,
                    'choice_label' => 'name',
                ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Document',
            'allow_extra_fields' => true,
        ]);
    }

    public function getName() {
        return 'document';
    }

}
