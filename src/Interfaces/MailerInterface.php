<?php
/**
 * Project mailer-sdk.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/27/18
 * Time: 11:42
 */

namespace nguyenanhung\MailerSDK\Interfaces;

/**
 * Interface MailerInterface
 *
 * @package   nguyenanhung\MailerSDK\Interfaces
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
interface MailerInterface
{
    const DEFAULT_CHARSET = 'utf-8';

    /**
     * Function setConfig
     *
     * Cài đặt cấu hình gửi mail
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/11/18 15:08
     *
     * @param array $config mảng dữ liệu chứa thông tin config
     *
     * @see   Repository/config/example_config_mail.php
     *
     * @return  $this
     */
    public function setConfig($config = []);

    /**
     * Function getConfig
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:46
     *
     * @return array|null
     */
    public function getConfig();

    /**
     * Function setSubject
     *
     * Cài đặt tiêu đề thư
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/11/18 15:08
     *
     * @param string $subject Tiêu đề thư
     *
     * @return  $this
     */
    public function setSubject($subject = '');

    /**
     * Function getSubject
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:46
     *
     * @return string
     */
    public function getSubject();

    /**
     * Function setFrom
     *
     * Cài đặt địa chỉ gửi email đi
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/11/18 15:08
     *
     * @param string|array $from Mảng dữ liệu về thông tin địa chỉ gửi mail đi
     *
     * @return  $this
     */
    public function setFrom($from = []);

    /**
     * Function getFrom
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:47
     *
     * @return array
     */
    public function getFrom();

    /**
     * Function setTo
     *
     * Cài đặt địa chỉ gửi email đến
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/11/18 15:08
     *
     * @param string|array $to Mảng dữ liệu về thông tin địa chỉ gửi mail đến
     *
     * @return  $this
     */
    public function setTo($to = []);

    /**
     * Function getTo
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:47
     *
     * @return array
     */
    public function getTo();

    /**
     * Function setCc
     *
     * Cài đặt địa chỉ gửi email đến dưới dạng cc
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/11/18 15:08
     *
     * @param string|array $cc Mảng dữ liệu về thông tin địa chỉ gửi mail đến dưới dạng cc
     *
     * @return  $this
     */
    public function setCc($cc = []);

    /**
     * Function getCc
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:47
     *
     * @return array
     */
    public function getCc();

    /**
     * Function setBcc
     *
     * Cài đặt địa chỉ gửi email đến dưới dạng bcc
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/11/18 15:08
     *
     * @param string|array $bcc Mảng dữ liệu về thông tin địa chỉ gửi mail đến dưới dạng bcc
     *
     * @return  $this
     */
    public function setBcc($bcc = []);

    /**
     * Function getBcc
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:47
     *
     * @return array
     */
    public function getBcc();

    /**
     * Function setBody
     *
     * Cài đặt nội dung thư
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/11/18 15:08
     *
     * @param string $body Nội dung thư gửi đi
     *
     * @return  $this
     */
    public function setBody($body = '');

    /**
     * Function getBody
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:47
     *
     * @return string
     */
    public function getBody();

    /**
     * Function setContentType
     *
     * Cài đặt Content Type
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/11/18 15:08
     *
     * @param string $contentType text/plain or text/html
     *
     * @return  $this
     */
    public function setContentType($contentType = '');

    /**
     * Function getContentType
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:48
     *
     * @return string
     */
    public function getContentType();

    /**
     * Function send
     *
     * Hàm gửi Email
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/11/18 15:36
     *
     * @return $this
     */
    public function send();

    /**
     * Function getResult
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:50
     *
     * @return bool|null|string TRUE nếu gửi tin thành công
     * FALSE nếu gửi tin thất bại
     * NULL nếu có lỗi Exception xảy ra
     * Message Error trả về nếu có các lỗi khác
     */
    public function getResult();
}