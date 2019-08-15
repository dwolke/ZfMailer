<?php

return array(

  'service_manager' => array(
    'factories' => array(
      'ZfMailerOptions' => 'ZfMailer\Options\ModuleOptionsFactory',
      'ZfMailer\Service\Mailer' => 'ZfMailer\Service\MailerFactory',
      'ZfMailer\Service\MailMessage' => 'ZfMailer\Service\MailMessageFactory',
      'ZfMailer\Service\Transport' => 'ZfMailer\Service\MailTransportFactory',
      'ZfMailer\View\MailRenderer' => 'ZfMailer\View\MailRendererFactory',
    ),
  ),

  'view_manager' => array(
    'template_path_stack' => array(
      __DIR__ . '/../view',
    ),
  ),

);
