<?php

/**
 * URLcrypt
 *
 * PHP library to securely encode and decode short pieces of arbitrary binary data in URLs.
 *
 * (c) Aaron Francis
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code.
 */

namespace Urlcrypt;

class Urlcrypt
{
    public static $key = "";

    public static function encrypt($str)
    {
        if (self::$key === "") {
            throw new \Exception('No key provided.');
        }

        $data = openssl_encrypt($str, 'bf-ecb', self::$key, true);

        return bin2hex($data);
    }

    public static function decrypt($str)
    {
        if (self::$key === "") {
            throw new \Exception('No key provided.');
        }

        $data = hex2bin($str);
        return openssl_decrypt($data, 'bf-ecb', self::$key, true);
    }
}
