<?php
/**
 * Project mailer-sdk
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 01/21/2021
 * Time: 15:25
 */
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


