<?php declare(strict_types=1);

/**
 *  Website: https://mudew.com/
 *  Author: Lkeme
 *  License: The MIT License
 *  Email: Useri@live.cn
 *  Updated: 2022 ~ 2023
 *
 *   _____   _   _       _   _   _   _____   _       _____   _____   _____
 *  |  _  \ | | | |     | | | | | | | ____| | |     |  _  \ | ____| |  _  \ &   ／l、
 *  | |_| | | | | |     | | | |_| | | |__   | |     | |_| | | |__   | |_| |   （ﾟ､ ｡ ７
 *  |  _  { | | | |     | | |  _  | |  __|  | |     |  ___/ |  __|  |  _  /  　 \、ﾞ ~ヽ   *
 *  | |_| | | | | |___  | | | | | | | |___  | |___  | |     | |___  | | \ \   　じしf_, )ノ
 *  |_____/ |_| |_____| |_| |_| |_| |_____| |_____| |_|     |_____| |_|  \_\
 */

namespace Bhp\User;

use Bhp\Util\DesignPattern\SingleTon;
use JetBrains\PhpStorm\ArrayShape;

class User extends SingleTon
{
    /**
     * @return void
     */
    public function init(): void
    {

    }

    /**
     * @use 转换信息
     * @return array
     */
    #[ArrayShape(['csrf' => "mixed|string", 'uid' => "mixed|string", 'sid' => "mixed|string"])]
    public static function parseCookie(): array
    {
        $cookies = getU('cookie');
        preg_match('/bili_jct=(.{32})/', $cookies, $token);
        preg_match('/DedeUserID=(\d+)/', $cookies, $uid);
        preg_match('/DedeUserID__ckMd5=(.{16})/', $cookies, $sid);
        return [
            'csrf' => $token[1] ?? '',
            'uid' => $uid[1] ?? '',
            'sid' => $sid[1] ?? '',
        ];
    }


}