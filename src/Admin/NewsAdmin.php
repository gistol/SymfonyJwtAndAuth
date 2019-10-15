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

class NewsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', TextType::class);
        $formMapper->add('link', TextType::class);
        $formMapper->add('linkText', TextType::class);
        $formMapper->add('body', TextareaType::class);
        $formMapper->add('pushText', TextareaType::class);
        $formMapper->add('subtitle', TextareaType::class);
        $formMapper->add('isPublished', CheckboxType::class);
        $formMapper->add('sendPush', CheckboxType::class);
        $formMapper->add('created_at', DateTimeType::class);
        $formMapper->add('updated_at', DateTimeType::class);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
        $datagridMapper->add('isPublished');
        $datagridMapper->add('sendPush');
        $datagridMapper->add('created_at');
        $datagridMapper->add('updated_at');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title');
        $listMapper->addIdentifier('isPublished');
    }
}