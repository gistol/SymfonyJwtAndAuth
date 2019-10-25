<?php


namespace App\Admin;

use App\Entity\Resources;
use App\Entity\Answer;
use App\Entity\Question;
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


class ResourcesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', TextType::class);
        $formMapper->add('imageFileName', TextType::class);
        $formMapper->add('imageContentType', TextType::class);
        $formMapper->add('imageFileSize', TextType::class);
        $formMapper->add('imageUpdatedAt', DateTimeType::class);
        $formMapper->add('videoFileName', TextType::class);
        $formMapper->add('videoContentType', TextType::class);
        $formMapper->add('videoFileSize', TextType::class);
        $formMapper->add('videoUpdatedAt', DateTimeType::class);
        $formMapper->add('text', TextType::class);
        $formMapper->add('resourceCategoryId', TextType::class);
        $formMapper->add('created_at', DateTimeType::class);
        $formMapper->add('updated_at', DateTimeType::class);
        $formMapper->add('imageMeta', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
        $datagridMapper->add('imageFileName');
        $datagridMapper->add('imageFileSize');
        $datagridMapper->add('imageUpdatedAt');
        $datagridMapper->add('videoContentType');
        $datagridMapper->add('videoUpdatedAt');
        $datagridMapper->add('created_at');
        $datagridMapper->add('updated_at');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('title');
        $listMapper->add('imageFileName');
        $listMapper->add('imageFileSize');
        $listMapper->add('imageUpdatedAt');
        $listMapper->add('videoContentType');
        $listMapper->add('videoUpdatedAt');
        $listMapper->add('created_at');
        $listMapper->add('updated_at');
    }
}