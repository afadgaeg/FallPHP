<?php

namespace com\fall\util;
use com\fall\util\Messages;
class Context {
    public static $request;
    public static $messages;
    public static $root;

    public static function init() {
        self::$root = __DIR__ . '/../../..';
        self::$messages= new Messages();
    }
    
    
}
