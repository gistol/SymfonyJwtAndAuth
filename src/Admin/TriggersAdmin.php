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
use Symfony\Component\Validator\Constraints\Json;

class TriggersAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', TextType::class);
        $formMapper->add('text', TextType::class);
        $formMapper->add('reiteration', TextType::class);
        $formMapper->add('currentTrigger', TextType::class);
        $formMapper->add('sourceType', TextType::class);
        $formMapper->add('sourceId', TextType::class);
        $formMapper->add('targetType', TextType::class);
        $formMapper->add('targetId', TextType::class);
        $formMapper->add('created_at', DateTimeType::class);
        $formMapper->add('updated_at', DateTimeType::class);
        $formMapper->add('triggerData', TextType::class);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('text');
        $datagridMapper->add('title');
        $datagridMapper->add('reiteration');
        $datagridMapper->add('currentTrigger');
        $datagridMapper->add('sourceType');
        $datagridMapper->add('sourceId');
        $datagridMapper->add('targetType');
        $datagridMapper->add('targetId');
        $datagridMapper->add('created_at');
        $datagridMapper->add('updated_at');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('title');
        $listMapper->add('text');
        $listMapper->add('reiteration');
        $listMapper->add('currentTrigger');
        $listMapper->add('sourceType');
        $listMapper->add('sourceId');
        $listMapper->add('targetType');
        $listMapper->add('targetId');
        $listMapper->add('created_at');
        $listMapper->add('updated_at');
        $listMapper->add('triggerData');

    }


}