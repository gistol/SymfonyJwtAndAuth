<?php


namespace App\Admin;

use App\Entity\Device;
use App\Entity\Image;
use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\Form\Type\DatePickerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class UsersAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('email', TextType::class);
//        $formMapper
//            ->add('image', ModelType::class, [
//            'class' => Image::class,
//            'property' => 'name',
//        ]);

        $formMapper
            ->add('document', VichFileType::class, [
                'label' => 'Image',
                'mapped' => true,
            ])
        ;

//        $formMapper->add('myDocument', VichFileType::class, [
//            'label'         => false,
//            'required'      => false,
//            'allow_delete'  => false,
//            'download_link' => true,
//        ]);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('email');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('email');
    }
}