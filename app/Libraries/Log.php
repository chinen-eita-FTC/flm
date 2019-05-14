<?php
declare(strict_types=1);

namespace App\Libraries;

use Illuminate\Support\Facades\Log as BaseLog;
use Illuminate\Support\Facades\Session;

/**
 * ロギングライブラリ
 * 定義しているパブリックメソッドはPSR-3のログレベルに準拠したものを提供する。
 *
 * @see https://www.php-fig.org/psr/psr-3/
 * @package App\Libraries
 */
class Log extends BaseLog
{
    /**
     * EMERGENCYレベルのログを出力
     *
     * @param string $message ログ出力時のメッセージ
     * @param array $context フォーマット指定外の項目
     */
    public static function emergency($message, array $context = array())
    {
        $message = sprintf('[id:%s] %s', self::getUniqueKey(), $message);
        BaseLog::emergency($message, $context);
    }

    /**
     * ALERTレベルのログを出力
     *
     * @param string $message ログ出力時のメッセージ
     * @param array $context フォーマット指定外の項目
     */
    public static function alert($message, array $context = array())
    {
        $message = sprintf('[id:%s] %s', self::getUniqueKey(), $message);
        BaseLog::alert($message, $context);
    }

    /**
     * CRITICALレベルのログを出力
     *
     * @param string $message ログ出力時のメッセージ
     * @param array $context フォーマット指定外の項目
     */
    public static function critical($message, array $context = array())
    {
        $message = sprintf('[%s] %s', self::getUniqueKey(), $message);
        BaseLog::critical($message, $context);
    }

    /**
     * ERRORレベルのログを出力
     *
     * @param string $message ログ出力時のメッセージ
     * @param array $context フォーマット指定外の項目
     */
    public static function error($message, array $context = array())
    {
        $message = sprintf('[id:%s] %s', self::getUniqueKey(), $message);
        BaseLog::error($message, $context);
    }

    /**
     * WARNINGレベルのログを出力
     *
     * @param string $message ログ出力時のメッセージ
     * @param array $context フォーマット指定外の項目
     */
    public static function warning(string $message, array $context = array())
    {
        $message = sprintf('[id:%s] %s', self::getUniqueKey(), $message);
        BaseLog::warning($message, $context);
    }

    /**
     * NOTICEレベルのログを出力
     *
     * @param string $message ログ出力時のメッセージ
     * @param array $context フォーマット指定外の項目
     */
    public static function notice(string $message, array $context = array())
    {
        $message = sprintf('[id:%s] %s', self::getUniqueKey(), $message);
        BaseLog::notice($message, $context);
    }

    /**
     * INFOレベルのログを出力
     *
     * @param string $message ログ出力時のメッセージ
     * @param array $context フォーマット指定外の項目
     */
    public static function info(string $message, array $context = array())
    {
        $message = sprintf('[id:%s] %s', self::getUniqueKey(), $message);
        BaseLog::info($message, $context);
    }

    /**
     * DEBUGレベルのログを出力
     *
     * @param string $message ログ出力時のメッセージ
     * @param array $context フォーマット指定外の項目
     */
    public static function debug(string $message, array $context = array())
    {
        $message = sprintf('[id:%s] %s', self::getUniqueKey(), $message);
        BaseLog::debug($message, $context);
    }

    /**
     * クライアント識別子を取得
     *
     * @return string クライアント識別文字列
     */
    private static function getUniqueKey(): string
    {
        $uniqueKey = 'undefine_key';
        if (Session::has('_token')) {
            $uniqueKey = substr(
                Session::get('_token'),
                0,
                env('LOG_UNDEFINE_KEY_LENGTH', 6)
            );
        }
        return $uniqueKey;
    }
}