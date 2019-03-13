<?php

namespace com\kb\app\tool;

use com\kb\app\tool\WorkContext;
use com\kb\app\conf\Conf;

class Tool {

    static function getPDO() {
        $pdo = new \PDO('mysql:host=47.90.7.240;port=33060;dbname=hdgang', 'root', 'a52736822');
        $pdo->exec("SET NAMES 'utf8'");
        return $pdo;
    }

    public static function showAd($adid, $isLazyPosition = false) {
        $adsJson = json_decode(Conf::ADS_JSON_STR, true);
        if (!Conf::AD_OPEN) {
            return;
        }
        $adid = trim($adid);
        $_mobile = startsWith($adid, 'admb');
        if ((WorkContext::$isMobile && $_mobile) || ((!WorkContext::$isMobile) && (!$_mobile))) {
            if (array_key_exists($adid, $adsJson)) {
                $adJson = $adsJson[$adid];
                if (array_key_exists('script', $adJson)) {
                    $script = trim($adJson['script']);
                    if (!empty($script)) {
                        $isLazyAD = array_key_exists('lazy', $adJson) && $adJson['lazy'] == 'true';
                        if (!$isLazyPosition) {
                            echo '<div id="' . $adid . '">';
                            if (!$isLazyAD) {
                                echo $script;
                            }
                            echo '</div>';
                        } else if ($isLazyAD) {
                            echo '<span id="' . $adid . '_" class="global_addata">';
                            echo $script;
                            echo '</span>';
                        }
                    }
                }
            }
        }
    }

}
