#ZfMailer
---------

[![Build Status](https://travis-ci.org/dwolke/ZfMailer.png)](https://travis-ci.org/dwolke/ZfMailer) [![Code Coverage](https://scrutinizer-ci.com/g/dwolke/ZfMailer/badges/coverage.png?s=7d5932c77bea64a417ac8e3da51dca6da1fcb22e)](https://scrutinizer-ci.com/g/dwolke/ZfMailer/) [![Latest Stable Version](https://poser.pugx.org/zf-commons/zfc-user/v/stable.png)](https://packagist.org/packages/zf-commons/zfc-user) [![Latest Unstable Version](https://poser.pugx.org/zf-commons/zfc-user/v/unstable.png)](https://packagist.org/packages/zf-commons/zfc-user)

Created by Donnie W. Kalauer and the dwLabs team

##Introduction
--------------

ZfMailer ist ein einfaches E-Mail-Modul für Zend Framework 2 und basiert auf Zend\Mail. E-Mails können im Textformat oder als MIME-konforme "Multi-Part" Mails verschickt werden. Das Versenden von E-Mails mit Anhängen wird ebenfalls unterstützt.

Weitere Informationen und Beispiele sind unter [ZfMailer Wiki](https://github.com/dwolke/ZfMailer/wiki) verfügbar.

##Requirements
--------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)

##Installation
--------------

###Setup (via Composer)

1. Hinzufügen des Projekts zu deiner composer.json

	$ require dwolke/zf-mailer

2. Installation

	$ composer update


###Nach der Installation



1. Enabling it in your `application.config.php`file.

    ```php
    <?php
    return array(
        'modules' => array(
            // ...
            'ZfcUser',
        ),
        // ...
    );
    ```

2. Then Import the SQL schema located in `./vendor/zf-commons/zfc-user/data/schema.sql` (if you installed using the Composer) or in `./vendor/ZfcUser/data/schema.sql`.

### Post-Install: Doctrine2 ORM

Coming soon...

### Post-Install: Doctrine2 MongoDB ODM

Coming soon...

### Post-Install: Zend\Db

1. If you do not already have a valid Zend\Db\Adapter\Adapter in your service
   manager configuration, put the following in `./config/autoload/database.local.php`:

```php
<?php
return array(
    'db' => array(
        'driver'    => 'PdoMysql',
        'hostname'  => 'changeme',
        'database'  => 'changeme',
        'username'  => 'changeme',
        'password'  => 'changeme',
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
);

```

Navigate to http://yourproject/user and you should land on a login page.

Password Security
-----------------

**DO NOT CHANGE THE PASSWORD HASH SETTINGS FROM THEIR DEFAULTS** unless A) you
have done sufficient research and fully understand exactly what you are
changing, **AND** B) you have a **very** specific reason to deviate from the
default settings.

If you are planning on changing the default password hash settings, please read
the following:

- [PHP Manual: crypt() function](http://php.net/manual/en/function.crypt.php)
- [Securely Storing Passwords in PHP by Adrian Schneider](http://www.syndicatetheory.com/labs/securely-storing-passwords-in-php)

The password hash settings may be changed at any time without invalidating existing
user accounts. Existing user passwords will be re-hashed automatically on their next
successful login.

**WARNING:** Changing the default password hash settings can cause serious
problems such as making your hashed passwords more vulnerable to brute force
attacks or making hashing so expensive that login and registration is
unacceptably slow for users and produces a large burden on your server(s). The
default settings provided are a very reasonable balance between the two,
suitable for computing power in 2013.

Options
-------

The ZfcUser module has some options to allow you to quickly customize the basic
functionality. After installing ZfcUser, copy
`./vendor/zf-commons/zfc-user/config/zfcuser.global.php.dist` to
`./config/autoload/zfcuser.global.php` and change the values as desired.

The following options are available:

- **user_entity_class** - Name of Entity class to use. Useful for using your own
  entity class instead of the default one provided. Default is
  `ZfcUser\Entity\User`.
- **enable_username** - Boolean value, enables username field on the
  registration form. Default is `false`.
- **auth_identity_fields** - Array value, specifies which fields a user can
  use as the 'identity' field when logging in.  Acceptable values: username, email.
- **enable_display_name** - Boolean value, enables a display name field on the
  registration form. Default value is `false`.
- **enable_registration** - Boolean value, Determines if a user should be
  allowed to register. Default value is `true`.
- **login_after_registration** - Boolean value, automatically logs the user in
  after they successfully register. Default value is `false`.
- **use_registration_form_captcha** - Boolean value, determines if a captcha should
  be utilized on the user registration form. Default value is `true`. (Note,
  right now this only utilizes a weak Zend\Text\Figlet CAPTCHA, but I have plans
  to make all Zend\Captcha adapters work.)
- **login_form_timeout** - Integer value, specify the timeout for the CSRF security
  field of the login form in seconds. Default value is 300 seconds.
- **user_form_timeout** - Integer value, specify the timeout for the CSRF security
  field of the registration form in seconds. Default value is 300 seconds.
- **use_redirect_parameter_if_present** - Boolean value, if a redirect GET
  parameter is specified, the user will be redirected to the specified URL if
  authentication is successful (if present, a GET parameter will override the
  login_redirect_route specified below).
- **login_redirect_route** String value, name of a route in the application
  which the user will be redirected to after a successful login.
- **logout_redirect_route** String value, name of a route in the application which
  the user will be redirected to after logging out.
- **password_cost** - This should be an integer between 4 and 31. The number
  represents the base-2 logarithm of the iteration count used for hashing.
  Default is `10` (about 10 hashes per second on an i5).
- **enable_user_state** - Boolean value, enable user state usage. Should user's
  state be used in the registration/login process?
- **default_user_state** - Integer value, default user state upon registration.
  What state user should have upon registration?
- **allowed_login_states** - Array value, states which are allowing user to login.
  When user tries to login, is his/her state one of the following? Include null if
  you want user's with no state to login as well.

