<?php


namespace App\Admin;

use App\Entity\Answer;
use App\Entity\Levels;
use App\Entity\UserLevels;
use App\Entity\User;
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

class UserLevelsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('user', TextType::class);
        $formMapper->add('level',  ModelType::class, [
            'class' => Levels::class,
            'property' => 'levels',
            'multiple' => true,
        ]);

        $formMapper->add('status', TextType::class);
        $formMapper->add('created_at', DateTimeType::class);
        $formMapper->add('updated_at', DateTimeType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('user');
        $datagridMapper->add('level');
        $datagridMapper->add('status');
        $datagridMapper->add('created_at');
        $datagridMapper->add('updated_at');
    }

    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper->addIdentifier('user');
        $listMapper->add('level');
        $listMapper->addIdentifier('created_at');
        $listMapper->addIdentifier('updated_at');
    }
}