<?php

namespace {

    function __autoload($classname) {
        $class_path = \str_replace('\\', DIRECTORY_SEPARATOR, $classname);
        $file = __DIR__ . '/../../' . $class_path . '.php';
        if (\file_exists($file)) {
            require_once($file);
            if (\class_exists($classname, false)) {
                return true;
            }
        }
        return false;
    }

}

namespace com\kb {

    use com\kb\app\tool\WorkContext;
    use com\fall\util\Context;
    use com\kb\app\action\MovieAction;

\ini_set('display_errors', 1);
    \error_reporting(E_ALL ^ E_NOTICE);

    Context::init();
    WorkContext::init();

//$httpHost = \htmlspecialchars($_SERVER['HTTP_HOST']);
//$requestUri = $_SERVER['REQUEST_URI'];


    if (\preg_match('/^\/$/', WorkContext::$requestPath)) {
        $result = (new MovieAction())->list_();
    } else if (\preg_match('/^\/movie\/(\d+)$/', WorkContext::$requestPath, $matches)) {
        $_GET['id'] = $matches[1];
        $result = (new MovieAction())->detail();
    } else if (\preg_match('/^\/movie\/list$/', WorkContext::$requestPath)) {
        $result = (new MovieAction())->list_();
    } else if (\preg_match('/^\/t$/', WorkContext::$requestPath)) {
        $result = (new MovieAction())->test();
    } else {
        \header("Content-Type: text/html;charset=utf-8");
        include WorkContext::$viewRoot . '/404.php';
    }

    \header("Content-Type: text/html;charset=utf-8");
    include WorkContext::$viewRoot . $result;
    exit;
}




