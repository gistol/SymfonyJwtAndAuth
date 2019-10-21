<?php


namespace App\Admin;

use App\Entity\Question;
use App\Entity\Answer;
use Faker\Provider\Text;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\Form\Type\DatePickerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class QuestionAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('sourceType', TextType::class);
        $formMapper->add('sourceId', TextType::class);
        $formMapper->add('mode', TextType::class);
        $formMapper->add('image_file_name', TextType::class);
        $formMapper->add('image_content_type', TextType::class);
        $formMapper->add('image_file_size', TextType::class);
        $formMapper->add('image_updated_at', DateTimeType::class);
        $formMapper->add('text', TextType::class);
        $formMapper->add('weight', TextType::class);
        $formMapper->add('created_at', DateTimeType::class);
        $formMapper->add('updated_at', DateTimeType::class);
        $formMapper->add('image_meta', TextType::class);
        $formMapper->add('answer', ModelType::class, [
            'class' => Answer::class,
            'property' => 'id',
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('updated_at');
        $datagridMapper->add('sourceType');
        $datagridMapper->add('created_at');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('created_at');
        $listMapper->addIdentifier('updated_at');
        $listMapper->addIdentifier('sourceType');
        $listMapper->addIdentifier('sourceId');
        $listMapper->addIdentifier('mode');
        $listMapper->addIdentifier('image_file_name');
        $listMapper->addIdentifier('image_content_type');
        $listMapper->addIdentifier('image_file_size');
        $listMapper->addIdentifier('image_updated_at');
        $listMapper->addIdentifier('text');
        $listMapper->addIdentifier('weight');

    }
}