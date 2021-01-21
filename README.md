[![Latest Stable Version](https://poser.pugx.org/nguyenanhung/mailer-sdk/v/stable)](https://packagist.org/packages/nguyenanhung/mailer-sdk)
[![Total Downloads](https://poser.pugx.org/nguyenanhung/mailer-sdk/downloads)](https://packagist.org/packages/nguyenanhung/mailer-sdk)
[![Latest Unstable Version](https://poser.pugx.org/nguyenanhung/mailer-sdk/v/unstable)](https://packagist.org/packages/nguyenanhung/mailer-sdk)
[![composer.lock](https://poser.pugx.org/nguyenanhung/mailer-sdk/composerlock)](https://packagist.org/packages/nguyenanhung/mailer-sdk)
[![License](https://poser.pugx.org/nguyenanhung/mailer-sdk/license)](https://packagist.org/packages/nguyenanhung/mailer-sdk)
# Mailer Project

Simple Class send Email use SMTP

### Setup Guide
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


### Contact

If any question & request, please contact following information

| Name        | Email                | Skype            | Facebook      |
| ----------- | -------------------- | ---------------- | ------------- |
| Hung Nguyen | dev@nguyenanhung.com | nguyenanhung5891 | @nguyenanhung |

From Hanoi with Love <3


