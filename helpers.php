<?php
/**
 * Project mailer-sdk
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 2/12/20
 * Time: 11:29
 */
if (!function_exists('sendSmtpMailer')) {
    /**
     * Function sendSmtpMailer
     *
     * @param array  $config
     * @param string $subject
     * @param array  $from
     * @param array  $to
     * @param array  $cc
     * @param array  $bcc
     * @param string $body
     * @param string $contentType
     *
     * @return bool|string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 2/12/20 34:25
     */
    function sendSmtpMailer($config = array(), $subject = '', $from = array(), $to = array(), $cc = array(), $bcc = array(), $body = '', $contentType = '')
    {
        $mail = new nguyenanhung\MailerSDK\Mailer();
        $mail->setConfig($config)
             ->setContentType($contentType)
             ->setSubject($subject)
             ->setFrom($from)->setTo($to)->setCc($cc)
             ->setBcc($bcc)
             ->setBody($body)
             ->send();
        $result = $mail->getResult();

        return $result;
    }
}
