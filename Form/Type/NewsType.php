<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 23/01/17
 * Time: 3:03 PM
 */

namespace Viweb\NewsBundle\Form\Type;


use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Viweb\MediaBundle\Form\Type\MediaType;
use Viweb\NewsBundle\Entity\News;


class NewsType extends AbstractResourceType
{
    public function __construct($dataClass = null, $validationGroups = [])
    {
        if(!$dataClass){
            $dataClass = News::class;
        }
        parent::__construct($dataClass, $validationGroups);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', EntityType::class, [
                "label" => "Categorie",
                "class" => 'Viweb\NewsBundle\Entity\Category',
                "expanded" => false,
                "multiple" => false,
                'required' => false
            ])
            ->add('sticky', CheckboxType::class)
            ->add('photo', MediaType::class)
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => NewsTranslationType::class
            ]);

    }
}