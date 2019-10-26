<?php


namespace App\Admin;

use App\Entity\Device;
use App\Entity\User;
use App\Form\UploadDocumentType;
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
use Vich\UploaderBundle\Form\Type\VichFileType;

class DocumentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->add('updatedAt', DateTimeType::class);
        $formMapper->add('documentFileName', TextType::class);
        $formMapper->add('documentFile', VichFileType::class, [
        ]);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('updatedAt');
        $datagridMapper->add('documentFileName');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('updatedAt');
        $listMapper->addIdentifier('documentFileName');
    }
}