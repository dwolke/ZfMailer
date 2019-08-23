# ZfMailer
> Simple Mailer for the Zend Framework

[![Latest Unstable Version][icon-unstable]][link-unstable] [![License][icon-license]][link-license] [![Build Status][icon-build]][link-build] [![Code Coverage][icon-codecov]][link-codecov]


**WARNING:** This module is currently under  heavy development and is not intended for use in productive environment.

## Introduction

ZfMailer is a simple e-mail module for Zend Framework based on *Zend\Mail*. E-mails can be sent in text format or as MIME-compliant "multi-part" mails. Sending e-mails with attachments is also supported.

Currently, only sending e-mails by SMTP is supported. Maybe this module will be extended later with further possibilities.

## Installation

### Main Setup

1. Add this project and the requirements in your composer.json:

```json
"require": {
  "dwolke/zf-mailer": "dev-master"
}
```

2. Now tell composer to download ZfMailer by running the command:

```bash
$ php composer.phar update
```

### Post Installation

After installation with composer, add the module to your application.config.php.

```php
<?php

return array(
  'modules' => array(
    // ...
    'ZfMailer',
    // ...
  ),
  // ...
);
```



## Settings

Copy the configuration file from `vendor/dwolke/zf-mailer/config/zfmailer.local.php.dist` to `config/autoload/zfmailer.local.php` and change the values as desired.

### Options

The following options are available:

* **smart_host** [array] - configures the server that sends the mails
  * **server_name** [string] - servers hostname
  * **server_port** [string] - tcp port, default is 25
  * **username** [string] - username for connection to the server
  * **password** [string] - password for connection to the server
* **encoding** [string, optional] - default is 'UTF-8'
* **default_from** [string, optional] - This e-mail address for the sender will be used if no sender address is specified when sending an e-mail.
* **return_path** [string, optional] - Address to which bounces are sent
* **reply_to** [string, optional] - Address to which replys are sent.
* **x_mailer** [string, optinal] - Adds the 'X-Mailer' header to an e-mail
* **organization** [string, optional] - Adds the 'Organization' header to an e-mail

## Usage

Using the mailer is quite simple.

```php

// get the service
$mailer = $serviceManager->get('ZfMailer\Service\Mailer');

// create a new mail
$mailer->createNewMail($recipient, $subject, $sender);

// set the content and render the e-mail body
$mailer->prepareAsMultipart($mailContent, $textTemplate, $htmlTemplate);

// send the e-mail
$mailer->sendEmail();
```
That's all.



---
Copyright © 2012 - 2019 by dwLabs. Alle Rechte vorbehalten. 😎


[icon-unstable]: https://poser.pugx.org/dwolke/zf-mailer/v/unstable
[icon-license]: https://poser.pugx.org/dwolke/zf-mailer/license
[icon-build]: https://scrutinizer-ci.com/g/dwolke/ZfMailer/badges/build.png?b=develop
[icon-codecov]: https://scrutinizer-ci.com/g/dwolke/ZfMailer/badges/coverage.png?b=develop


[link-unstable]: https://packagist.org/packages/dwolke/zf-mailer
[link-license]: https://packagist.org/packages/dwolke/zf-mailer
[link-build]: https://scrutinizer-ci.com/g/dwolke/ZfMailer/build-status/develop
[link-codecov]: https://scrutinizer-ci.com/g/dwolke/ZfMailer/?branch=develop
