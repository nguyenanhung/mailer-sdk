[![Latest Stable Version](http://poser.pugx.org/nguyenanhung/mailer-sdk/v)](https://packagist.org/packages/nguyenanhung/mailer-sdk) [![Total Downloads](http://poser.pugx.org/nguyenanhung/mailer-sdk/downloads)](https://packagist.org/packages/nguyenanhung/mailer-sdk) [![Latest Unstable Version](http://poser.pugx.org/nguyenanhung/mailer-sdk/v/unstable)](https://packagist.org/packages/nguyenanhung/mailer-sdk) [![License](http://poser.pugx.org/nguyenanhung/mailer-sdk/license)](https://packagist.org/packages/nguyenanhung/mailer-sdk) [![PHP Version Require](http://poser.pugx.org/nguyenanhung/mailer-sdk/require/php)](https://packagist.org/packages/nguyenanhung/mailer-sdk)

# Mailer Project

Simple Class send Email use SMTP

## Version

- [x] V1.x, V2.x support all PHP version `>=5.4`
- [x] V3.x support all PHP version `>=7.0`

## Setup Guide

```php
// Sample Config Email
require_once __DIR__ . '/vendor/autoload.php';


$sampleConfig = [
    'hostname' => '',
    'port'     => '',
    'username' => '',
    'password' => '',
    'from'     => '',
];
$mailer       = new \nguyenanhung\MailerSDK\Mailer();
$mailer->setConfig($sampleConfig);
$mailer->setFrom()
       ->setTo()
       ->setCc()
       ->setBcc()
       ->setSubject()
       ->setBody()
       ->setContentType();
$mailer->send();

$result = $mailer->getResult();
```

## Contact

If any question & request, please contact following information

| Name        | Email                | Skype            | Facebook      |
|-------------|----------------------|------------------|---------------|
| Hung Nguyen | dev@nguyenanhung.com | nguyenanhung5891 | @nguyenanhung |

From Hanoi with Love <3


