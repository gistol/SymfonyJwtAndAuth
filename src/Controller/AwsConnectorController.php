<?php

$myEntity = new \App\Entity\AwsConnector();
$form = $this->createForm(UploadDocumentType::class, $myEntity);

return [ 'form' => $form->createView()];