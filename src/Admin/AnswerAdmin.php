<?php


namespace App\Admin;

use App\Entity\Answer;
use App\Entity\Question;
use App\Entity\Task;
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


class AnswerAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('isCorrect', CheckboxType::class);
        $formMapper->add('parentId', TextType::class);
        $formMapper->add('lft', TextType::class);
        $formMapper->add('rgt', TextType::class);
        $formMapper->add('created_at', DateTimeType::class);
        $formMapper->add('updated_at', DateTimeType::class);

        $formMapper->add('question', ModelType::class, [
            'class' => Question::class,
            'property' => 'id',
        ]);

        $formMapper->add('task', ModelType::class, [
            'class' => Task::class,
            'property' => 'id',
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('created_at');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('created_at');
        $listMapper->addIdentifier('user_id');
        $listMapper->addIdentifier('answer_id');
        $listMapper->addIdentifier('updated_at');
        $listMapper->addIdentifier('lft');
    }
}
