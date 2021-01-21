<?php
/**
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 10/4/18
 * Time: 14:55
 */

namespace nguyenanhung\MailerSDK;

/**
 * Interface MailerInterface
 *
 * @package   nguyenanhung\MailerSDK
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
interface MailerInterface
{
    const VERSION       = '2.0.1';
    const LAST_MODIFIED = '2021-01-21';
    const AUTHOR_NAME   = 'Hung Nguyen';
    const AUTHOR_EMAIL  = 'dev@nguyenanhung.com';
    const PROJECT_NAME  = 'Mailer SDK';
    const TIMEZONE      = 'Asia/Ho_Chi_Minh';

    /**
     * Function getVersion
     *
     * @return mixed
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 01/21/2021 21:16
     */
    public function getVersion();
}
