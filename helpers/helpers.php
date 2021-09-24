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
     * @param array        $config
     * @param string       $subject
     * @param array|string $from
     * @param array|string $to
     * @param array|string $cc
     * @param array|string $bcc
     * @param string       $body
     * @param string       $contentType
     *
     * @return bool|string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 2/12/20 34:25
     */
    function sendSmtpMailer(array $config = array(), $subject = '', $from = array(), $to = array(), $cc = array(), $bcc = array(), $body = '', $contentType = '')
    {
        $mail = new nguyenanhung\MailerSDK\Mailer();
        $mail->setConfig($config)
             ->setContentType($contentType)->setSubject($subject)
             ->setFrom($from)->setTo($to)->setCc($cc)->setBcc($bcc)
             ->setBody($body)->send();

        return $mail->getResult();
    }
}
if (!function_exists('isEmail')) {
    /**
     * Function isEmail
     *
     * @param string $email
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 02/09/2021 56:16
     */
    function isEmail($email = '')
    {
        if (empty($email)) {
            return false;
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // check Email
            $mail = explode("@", $email);
            if (!checkdnsrr($mail[1])) {
                return true;
            }
        }

        return false;
    }
}