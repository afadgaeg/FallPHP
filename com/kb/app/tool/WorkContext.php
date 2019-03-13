<?php
namespace com\kb\app\tool;

use com\fall\util\Util;
use com\fall\util\Context;
class WorkContext {

    public static $isMobile;
    public static $requestScheme;
    public static $requestPath;
    public static $viewRoot;
    const REQUEST_PARAMTER_ERROR = 'request_paramter_error';
    const STATUS_CODE_404 = '404';
    const OPERATE_SUCCESS = 'operate_success';

    public static function init() {
        self::$viewRoot = Context::$root.'/com/kb/app/view';
        self::$isMobile = Util::isMobile();
        self::$requestScheme = $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https' : 'http';
        $array = \explode('?', $_SERVER['REQUEST_URI']);
        self::$requestPath = \trim($array[0]);
    }

}
