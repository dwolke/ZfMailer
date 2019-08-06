<?php

return array(

  'zf_mailer' => array(

    // This sets the default "to" and "sender" headers for your message
    'defaults' => array(

      // Standard Codierung für Mails
      'defaultEncoding' => 'UTF-8',

      // Standard From
      // Entweder als From-Adresse als String oder als Array
      // 'from'   => array('name@email.com' => 'Name') oder
      // 'from'   => 'Name <name@email.com>'
      'from' => array('mailer@bikeshop-factory.de' => 'ZfMailer'),

      // Sender (falls abweichend von "from")
      // Array mit mindestens einem "address"-Element
      // zusätzlich kann ein "name"-Element angegeben werden.
      'sender' => array(
        'address' => 'mailer@bikeshop-factory.de',
        'name'    => 'ZfMailer'
      ),
      
    ),

    'mail_transport' => array(
      'class'   => 'Zend\Mail\Transport\Smtp',
      'options' => array(
        'host'             => 'mail.bikeshop-factory.de',
        'port'             => 25,
        'connectionClass'  => 'login',
        'connectionConfig' => array(
          //'ssl'      => 'tls',
          'username' => 'zzz@zzz.de',
          'password' => 'xxx-xxx',
        ),
      ),
    ),

  ),

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
