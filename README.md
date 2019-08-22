# ZfMailer
> Simple Mailer for the Zend Framework

[![Latest Version on Bitbucket][icon-stable]][link-stable] [![Latest Unstable Version][icon-unstable]][link-unstable] [![License][icon-license]][link-license] [![Build Status][icon-phpci]][link-phpci] [![CircleCI][icon-circleci2]][link-circleci] [![codecov][icon-codecov]][link-codecov]

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

The following options are available

| Setting                           | Description                                                 |
| ------------------------------------- | ------------------------------------------------------------ |
| **smart_host**        | Name... |
| **encoding**             | Typ: |
| **return_path** | Typ: |
| **reply_to**       | Typ: |
| **x_mailer**       | Typ: |
| **organization** | Typ: |
| **use_registration_form_captcha**     | Typ: |








TBD

---
Copyright © 2012 - 2019 by dwLabs. Alle Rechte vorbehalten. 😎

[icon-stable]: https://poser.pugx.org/dwolke/zf-mailer/v/stable
[icon-unstable]: https://poser.pugx.org/dwolke/zf-mailer/v/unstable
[icon-license]: https://poser.pugx.org/dwolke/zf-mailer/license
[icon-phpci]: https://ci.dw-labs.de/build-status/image/2?label=Build%201
[icon-circleci]: https://circleci.com/gh/dwolke/ZfMailer/tree/develop.svg?style=svg
[icon-circleci2]: https://img.shields.io/circleci/build/gh/dwolke/ZfMailer?label=Build%202
[icon-codecov]: https://codecov.io/gh/dwolke/ZfMailer/branch/develop/graph/badge.svg

[link-stable]: https://packagist.org/packages/dwolke/zf-mailer
[link-unstable]: https://packagist.org/packages/dwolke/zf-mailer
[link-license]: https://packagist.org/packages/dwolke/zf-mailer
[link-phpci]: https://ci.dw-labs.de/build-status/view/2
[link-circleci]: https://circleci.com/gh/dwolke/ZfMailer/tree/develop
[link-codecov]: https://codecov.io/gh/dwolke/ZfMailer
