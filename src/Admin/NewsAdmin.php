<?php


namespace App\Admin;

use App\Entity\Device;
use App\Entity\Document;
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
        $formMapper->add('link', TextType::class,['required' => false]);
        $formMapper
            ->add('myDocument', ModelType::class, [
                'class' => Document::class,
                'property' => 'documentFileName',
            ]);
        $formMapper->add('linkText', TextType::class,['required' => false]);
        $formMapper->add('body', TextareaType::class);
        $formMapper->add('pushText', TextareaType::class,['required' => false]);
        $formMapper->add('subtitle', TextareaType::class);
        $formMapper->add('isPublished', CheckboxType::class,['required' => false]);
        $formMapper->add('sendPush', CheckboxType::class,['required' => false]);
        $formMapper->add('created_at', DateTimeType::class,['required' => false]);
        $formMapper->add('updated_at', DateTimeType::class,['required' => false]);

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