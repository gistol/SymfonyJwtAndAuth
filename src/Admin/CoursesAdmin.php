<?php


namespace App\Admin;

use App\Entity\Device;
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

class CoursesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', TextType::class);
        $formMapper->add('description', TextareaType::class);
        $formMapper->add('mode', TextType::class);
        $formMapper->add('imageFileName', TextType::class);
        $formMapper->add('imageContentType', TextType::class);
        $formMapper->add('imageFileSize', TextType::class);
        $formMapper->add('created_at', DateTimeType::class);
        $formMapper->add('imageUpdatedAt', DateTimeType::class);
        $formMapper->add('updated_at', DateTimeType::class);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('created_at');
        $datagridMapper->add('updated_at');
        $datagridMapper->add('imageUpdatedAt');
        $datagridMapper->add('title');
        $datagridMapper->add('description');
        $datagridMapper->add('mode');
        $datagridMapper->add('imageFileName');
        $datagridMapper->add('imageContentType');
        $datagridMapper->add('imageFileSize');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title');
        $listMapper->addIdentifier('mode');
        $listMapper->addIdentifier('created_at');
    }
}