<?php


namespace App\Admin;

use App\Entity\Courses;
use App\Entity\Levels;
use App\Entity\Answer;
use App\Entity\Question;
use App\Entity\Topics;
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


class LevelsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('number', TextType::class);
        $formMapper->add('title', TextType::class);
        $formMapper->add('description', TextType::class);

        $formMapper->add('courses', ModelType::class, [
            'class' => Courses::class,
            'property' => 'title',
            'required' => false,
            'multiple' => true
        ]);

        $formMapper->add('created_at', DateTimeType::class);
        $formMapper->add('updated_at', DateTimeType::class);
        $formMapper->add('imageFileName', TextType::class);
        $formMapper->add('imageContentType', TextType::class);
        $formMapper->add('imageFileSize', TextType::class);
        $formMapper->add('imageUpdatedAt', DateTimeType::class);
        $formMapper->add('imageMeta', TextType::class);
        $formMapper->add('levels', TextType::class);


    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('number');
        $datagridMapper->add('title');
        $datagridMapper->add('created_at');
        $datagridMapper->add('updated_at');
        $datagridMapper->add('levels');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('number');
        $listMapper->addIdentifier('title');
        $listMapper->addIdentifier('created_at');
        $listMapper->addIdentifier('updated_at');
        $listMapper->addIdentifier('levels');

    }
}
