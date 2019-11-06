<?php


namespace App\Admin;

use App\Entity\Answers;
use App\Entity\Levels;
use App\Entity\Task;
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


class TaskAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('number', TextType::class);
        $formMapper->add('mode', TextType::class);
        $formMapper->add('created_at', DateTimeType::class);
        $formMapper->add('updated_at', DateTimeType::class);
        $formMapper->add('export', CheckboxType::class, ['required' => false]);

        $formMapper->add('topic', ModelType::class, [
            'class' => Topics::class,
            'property' => 'id',

        ]);

        $formMapper->add('level', ModelType::class, [
            'class' => Levels::class,
            'property' => 'id',
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('mode');
        $datagridMapper->add('number');
        $datagridMapper->add('created_at');
        $datagridMapper->add('updated_at');
        $datagridMapper->add('export');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('mode');
        $listMapper->add('number');
        $listMapper->add('created_at');
        $listMapper->add('updated_at');
        $listMapper->add('export');
    }
}
