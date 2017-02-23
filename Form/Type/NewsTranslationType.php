<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 23/01/17
 * Time: 3:06 PM
 */

namespace Viweb\NewsBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Viweb\NewsBundle\Entity\NewsTranslation;

class NewsTranslationType extends AbstractResourceType
{
    public function __construct($dataClass = null, $validationGroups = [])
    {
        if(!$dataClass){
            $dataClass = NewsTranslation::class;
        }
        parent::__construct($dataClass, $validationGroups);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('excerpt', TextareaType::class)
            ->add('body', TextareaType::class)
            ->add('slug', TextType::class)

            ;
        $builder->add('seoCollection', KeyValueType::class, [
            'value_type' => TextType::class,
            'value_options' => ['attr' => ['class' => 'span6 pull-right']],
            'key_options' => ['attr' =>['class' => 'span4']],
            'required' => false
        ]);
    }
}