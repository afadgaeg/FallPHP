<?php
namespace com\fall\util;

class Util {
    
    static function bindRequestParamter($bean, $array){
        $f = false;
        foreach ($array as $attr) {
            $func = 'set'.\ucfirst($attr);
            if($bean->$func(self::getInput($attr))){
                $f = true;
            }
        }
        return $f;
    }

    static function getInput($p) {
        $str = '';
        if (!empty($_GET[$p])) {
            $str = $_GET[$p];
            $str = trim($str);
//        $str = stripslashes($str);
//        $str = htmlspecialchars($str);
        }
        return $str;
    }

    static function encode($s, $isAnalytic, $f, $prefix='') {
        $s = preg_replace_callback('/[\x{4e00}-\x{9fa5}]+|[a-zA-Z0-9]+/u', function ($matches) use($isAnalytic, $f, $prefix) {
            $charset = 'UTF-8';
            $str = $matches[0];
            $len = mb_strlen($str, $charset);
            $c = mb_substr($str, 0, 1, $charset);
            $rt = '';
            if (strlen($c) == 1) {
                $rt.=' ' . $prefix . $str;
            } else if ($isAnalytic && $len != 1) {
                for ($i = 0; $i < $len - 1; $i++) {
                    $rt.=' ' . $prefix . encodeChineseChar(mb_substr($str, $i, 1, $charset), $f) . encodeChineseChar(mb_substr($str, $i + 1, 1, $charset), $f);
                }
            } else {
                $rt.=' ' . $prefix;
                for ($i = 0; $i < $len; $i++) {
                    $rt.= encodeChineseChar(mb_substr($str, $i, 1, $charset), $f);
                }
            }
            return $rt;
        }, $s);
        return trim($s);
    }

    static function encodeChineseChar($utf8Char, $f) {
        $c = iconv('UTF-8', 'UCS-2', $utf8Char);
        if ($f) {
            $d = ord($c[0]) * (1 << 8) + ord($c[1]);
        } else {
            $d = ord($c[1]) * (1 << 8) + ord($c[0]);
        }
        return str_pad(base_convert($d, 10, 16), 4, 0, STR_PAD_LEFT);
    }

    static function isMobile() {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
            return true;
        }
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset($_SERVER['HTTP_VIA'])) {
            // 找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        // 脑残法，判断手机发送的客户端标志,兼容性有待提高
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array('nokia',
                'sony',
                'ericsson',
                'mot',
                'samsung',
                'htc',
                'sgh',
                'lg',
                'sharp',
                'sie-',
                'philips',
                'panasonic',
                'alcatel',
                'lenovo',
                'iphone',
                'ipod',
                'blackberry',
                'meizu',
                'android',
                'netfront',
                'symbian',
                'ucweb',
                'windowsce',
                'palm',
                'operamini',
                'operamobi',
                'openwave',
                'nexusone',
                'cldc',
                'midp',
                'wap',
                'mobile'
            );
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return true;
            }
        }
        // 协议法，因为有可能不准确，放到最后判断
        if (isset($_SERVER['HTTP_ACCEPT'])) {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                return true;
            }
        }
        return false;
    }

    static function cutQS($url) {
        $strArray = explode('?', trim($url));
        $qs = '';
        foreach (explode('&', trim($strArray[1])) as $kv) {
            if (preg_match('/.+=.+/', $kv)) {
                $qs .= trim('&' . $kv);
            }
        }
        $url = $strArray[0];
        if (!empty($qs)) {
            $url .= '?' . substr($qs, 1);
        }
        return $url;
    }

    static function getRandomString($n) {
        $str = 'abcdefghijklmnopqrstuvwxyz';
        $len = strlen($str) - 1;
        $s = '';
        for ($i = 0; $i < $n; $i++) {
            $s .= $str[rand(0, $len)];
        }
        return $s;
    }
    
    //----------------------------------------------
    
    //function hasPermission($p) {
//    $role = $_SESSION['role'];
//    if ($role == 0) {
//        return true;
//    }
//    return false;
//}
    
    static function startsWith($haystack, $needle) {
        return $needle === "" || strpos($haystack, $needle) === 0;
    }

    static function contains($source, $target) {
        return strpos($source, $target) !== false;
    }

}
