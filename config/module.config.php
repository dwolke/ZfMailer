<?php
/**
 * ZfMailer
 *
 * @author     Daniel Wolkenhauer <hello@dw-labs.de>
 * @copyright  Copyright (c) 1997-2019 Daniel Wolkenhauer
 * @link       http://dw-labs.de/zfmailer
 * @version    0.1.0
 */

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
