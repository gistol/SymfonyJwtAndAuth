<?php
class UploadDocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        add('myDocument', VichFileType::class, [
            'label' => false,
            'required' => false,
            'allow_delete' => false,
            'download_link' => true,
        ]);
    }
}