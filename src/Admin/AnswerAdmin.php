<?php


namespace App\Admin;

use App\Entity\Answer;
use App\Entity\Question;
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
        $formMapper->add('taskId', CheckboxType::class);
        $formMapper->add('isCorrect', CheckboxType::class);
        $formMapper->add('isCorrect', CheckboxType::class);
        $formMapper->add('isCorrect', CheckboxType::class);
        $formMapper->add('isCorrect', CheckboxType::class);


    }
}