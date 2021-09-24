<?php
/**
 * Project mailer-sdk
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 10/11/18
 * Time: 14:59
 */

namespace nguyenanhung\MailerSDK;

use Exception;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

/**
 * Class Mailer
 *
 * @package   nguyenanhung\MailerSDK
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Mailer
{
    const VERSION         = '3.0.3';
    const LAST_MODIFIED   = '2021-09-24';
    const AUTHOR_NAME     = 'Hung Nguyen';
    const AUTHOR_EMAIL    = 'dev@nguyenanhung.com';
    const PROJECT_NAME    = 'Mailer SDK';
    const TIMEZONE        = 'Asia/Ho_Chi_Minh';
    const DEFAULT_CHARSET = 'utf-8';

    /** @var array|null Email Config */
    private $config;

    /** @var string Email Subject */
    private $subject;

    /** @var array|string Array Email from */
    private $from;

    /** @var array|string Array Email to */
    private $to;

    /** @var array|string Array Email cc */
    private $cc;

    /** @var array|string Array Email bcc */
    private $bcc;

    /** @var string Email Content */
    private $body;

    /** @var string Email Content Type */
    private $contentType;

    /** @var null|bool|string Email Result */
    private $result;

    /**
     * Mailer constructor.
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function __construct()
    {
    }

    /**
     * Function getVersion
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/11/18 15:02
     *
     * @return string Current Project Version
     */
    public function getVersion()
    {
        return self::VERSION;
    }

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
    public function setConfig(array $config = array())
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Function getConfig
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:46
     *
     * @return array|null
     */
    public function getConfig()
    {
        return $this->config;
    }

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
    public function setSubject($subject = '')
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Function getSubject
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:46
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

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
    public function setFrom($from = array())
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Function getFrom
     *
     * @return array
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/20/2021 58:45
     */
    public function getFrom()
    {
        return $this->from;
    }

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
    public function setTo($to = array())
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Function getTo
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:47
     *
     * @return array
     */
    public function getTo()
    {
        return $this->to;
    }

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
    public function setCc($cc = array())
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * Function getCc
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:47
     *
     * @return array
     */
    public function getCc()
    {
        return $this->cc;
    }

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
    public function setBcc($bcc = array())
    {
        $this->bcc = $bcc;

        return $this;
    }

    /**
     * Function getBcc
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:47
     *
     * @return array
     */
    public function getBcc()
    {
        return $this->bcc;
    }

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
    public function setBody($body = '')
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Function getBody
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:47
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

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
    public function setContentType($contentType = '')
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * Function getContentType
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/27/18 11:48
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

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
    public function send()
    {
        try {
            if (empty($this->to)) {
                $message = 'Không tìm thấy địa chỉ email gửi đến';
                $result  = $message;
            } elseif (empty($this->body)) {
                $message = 'Email không có nội dung';
                $result  = $message;
            } elseif (!class_exists('Swift_Message')) {
                $message = 'Class Swift_Message không tồn tại hoặc chưa được cài đặt!';
                $result  = $message;
            } else {
                $transport = (new Swift_SmtpTransport($this->config['hostname'], $this->config['port']))->setUsername($this->config['username'])->setPassword($this->config['password']);
                $mailer    = new Swift_Mailer($transport);
                $mail      = new Swift_Message();
                if (!empty($this->from)) {
                    $mail->setFrom($this->from);
                } else {
                    $mail->setFrom($this->config['from']);
                }
                if (!empty($this->cc)) {
                    $mail->setCc($this->cc);
                }
                if (!empty($this->bcc)) {
                    $mail->setBcc($this->bcc);
                }
                if (!empty($this->contentType)) {
                    $mail->setContentType($this->contentType);
                }
                $mail->setCharset(self::DEFAULT_CHARSET);
                $mail->setSubject($this->subject);
                $mail->setTo($this->to);
                $mail->setBody($this->body);
                if (!$mailer->send($mail)) {
                    $result = false;
                } else {
                    $result = true;
                }
            }
        } catch (Exception $e) {
            $message = 'Error File: ' . $e->getFile() . ' - Line: ' . $e->getLine() . ' - Code: ' . $e->getCode() . ' - Message: ' . $e->getMessage();
            if (function_exists('log_message')) {
                log_message('error', 'Error Message: ' . $e->getMessage());
                log_message('error', 'Error Trace As String: ' . $e->getTraceAsString());
            }
            $result = $message;
        }
        $this->result = $result;

        return $this;
    }

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
    public function getResult()
    {
        return $this->result;
    }
}
