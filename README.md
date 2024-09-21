[![Latest Stable Version](https://img.shields.io/packagist/v/nguyenanhung/mailer-sdk.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/mailer-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/nguyenanhung/mailer-sdk.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/mailer-sdk)
[![Daily Downloads](https://img.shields.io/packagist/dd/nguyenanhung/mailer-sdk.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/mailer-sdk)
[![Monthly Downloads](https://img.shields.io/packagist/dm/nguyenanhung/mailer-sdk.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/mailer-sdk)
[![License](https://img.shields.io/packagist/l/nguyenanhung/mailer-sdk.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/mailer-sdk)
[![PHP Version Require](https://img.shields.io/packagist/dependency-v/nguyenanhung/mailer-sdk/php)](https://packagist.org/packages/nguyenanhung/mailer-sdk)

# Mailer Project

Simple Class send Email use SMTP

## Version

- [x] V1.x, V2.x support all PHP version `>=5.5`
- [x] V3.x support all PHP version `>=7.0`

## Setup Guide

```php
<?php
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

echo "<pre>";
print_r($result);
echo "</pre>";

```

## Contact

If any question & request, please contact following information

| Name        | Email                | Skype            | Facebook      |
|-------------|----------------------|------------------|---------------|
| Hung Nguyen | dev@nguyenanhung.com | nguyenanhung5891 | @nguyenanhung |

From Hanoi with Love <3


