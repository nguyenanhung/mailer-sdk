<?php
/**
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 9/28/18
 * Time: 14:47
 */

namespace nguyenanhung\MailerSDK\Repository;

use nguyenanhung\MailerSDK\Interfaces\ProjectInterface;

/**
 * Class DataRepository
 *
 * @package   nguyenanhung\MailerSDK\Repository
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class DataRepository implements ProjectInterface
{
    const CONFIG_PATH = 'config';
    const CONFIG_EXT  = '.php';

    /**
     * Function getVersion
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 9/28/18 14:47
     *
     * @return string
     */
    public function getVersion()
    {
        return self::VERSION;
    }

    /**
     * Hàm lấy nội dung config được quy định trong thư mục config
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 9/28/18 14:47
     *
     * @param string $configName Tên file config
     *
     * @return array|mixed
     */
    public static function getData($configName)
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . self::CONFIG_PATH . DIRECTORY_SEPARATOR . $configName . self::CONFIG_EXT;
        if (is_file($path) && file_exists($path)) {
            return require $path;
        }

        return [];
    }

    /**
     * Hàm lấy nội dung Data từ 1 file bất kỳ trong hệ thống
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/17/18 09:25
     *
     * @param string $filename Đường dẫn file config
     *
     * @return array|mixed
     */
    public static function getDataContent($filename)
    {
        if (is_file($filename) && file_exists($filename)) {
            return require $filename;
        }

        return [];
    }
}
