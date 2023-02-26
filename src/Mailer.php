<?php
/**
 * Project mailer-sdk
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 10/11/18
 * Time: 14:59
 */

namespace nguyenanhung\MailerSDK;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP as PHPMailerSMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

/**
 * Class Mailer
 *
 * @package   nguyenanhung\MailerSDK
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Mailer
{
    const VERSION = '2.2.0';
    const LAST_MODIFIED = '2023-02-27';
    const AUTHOR_NAME = 'Hung Nguyen';
    const AUTHOR_EMAIL = 'dev@nguyenanhung.com';
    const PROJECT_NAME = 'Mailer SDK';
    const TIMEZONE = 'Asia/Ho_Chi_Minh';
    const DEFAULT_CHARSET = 'utf-8';

    /** @var array|null Email Config */
    protected $config;

    /** @var string Email Subject */
    protected $subject;

    /** @var array|string Array Email from */
    protected $from;

    /** @var array|string Array Email to */
    protected $to;

    /** @var array|string Array Email cc */
    protected $cc;

    /** @var array|string Array Email bcc */
    protected $bcc;

    /** @var array|string Add attachments */
    protected $attachment;

    /** @var string Email Content */
    protected $body;

    /** @var string Email Content Type */
    protected $contentType;

    /** @var null|bool|string Email Result */
    protected $result;

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
     * @return array|string
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
     * @return array|string
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
     * @return array|string
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
     * @return array|string
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
     *  Function setAttachment
     *
     * @param array|string $attachment
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;

        return $this;
    }

    /**
     * Function Attachment
     *
     * @return array|string
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * Function send
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 17/06/2022 54:03
     */
    public function send()
    {
        try {
            if (empty($this->to)) {
                $message = 'Không tìm thấy địa chỉ email gửi đến';
                $result = $message;
            } elseif (empty($this->body)) {
                $message = 'Email không có nội dung';
                $result = $message;
            } elseif (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
                $message = 'Class PHPMailer không tồn tại hoặc chưa được cài đặt!';
                $result = $message;
            } else {
                $mail = new PHPMailer(true);
                //Server settings
                $mail->SMTPDebug = PHPMailerSMTP::DEBUG_SERVER;             //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = $this->config['hostname'];              //Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                $mail->Username = $this->config['username'];              //SMTP username
                $mail->Password = $this->config['password'];              //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port = $this->config['port'];                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom($this->from);
                if (is_array($this->to)) {
                    foreach ($this->to as $to) {
                        $mail->addAddress($to);
                    }
                } else {
                    $mail->addAddress($this->to);
                }
                if (!empty($this->cc)) {
                    if (is_array($this->cc)) {
                        foreach ($this->cc as $cc) {
                            $mail->addCC($cc);
                        }
                    } else {
                        $mail->addCC($this->cc);
                    }
                }
                if (!empty($this->bcc)) {
                    if (is_array($this->bcc)) {
                        foreach ($this->bcc as $bcc) {
                            $mail->addBCC($bcc);
                        }
                    } else {
                        $mail->addBCC($this->bcc);
                    }
                }
                //Attachments
                if (!empty($this->attachment)) {
                    if (is_array($this->attachment)) {
                        foreach ($this->attachment as $attachment) {
                            $mail->addAttachment($attachment);
                        }
                    } else {
                        $mail->addAttachment($this->attachment);
                    }
                }
                //Content
                $mail->isHTML();                                  //Set email format to HTML
                $mail->Subject = $this->subject;
                $mail->Body = $this->body;
                $result = $mail->send();
            }
        } catch (PHPMailerException $e) {
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
