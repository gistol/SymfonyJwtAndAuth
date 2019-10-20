<?php


namespace App\Admin;

use App\Entity\Task;
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


class TaskAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('number', TextType::class);
        $formMapper->add('topicId', TextType::class);
        $formMapper->add('mode', TextType::class);
        $formMapper->add('created_at', DateTimeType::class);
        $formMapper->add('updated_at', DateTimeType::class);
        $formMapper->add('level_id', TextType::class);
        $formMapper->add('export', CheckboxType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('number');
        $datagridMapper->add('topicId');
        $datagridMapper->add('mode');
        $datagridMapper->add('created_at');
        $datagridMapper->add('updated_at');
        $datagridMapper->add('levelId');
        $datagridMapper->add('export');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('number');
        $listMapper->add('topicId');
        $listMapper->add('mode');
        $listMapper->add('created_at');
        $listMapper->add('updated_at');
        $listMapper->add('level_id');
        $listMapper->add('export');
    }
}
