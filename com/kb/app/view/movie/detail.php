<?php
namespace com\kb\app\view\movie;
use com\fall\util\Context;
use com\kb\app\tool\Tool;
use com\kb\app\tool\WorkContext;
use com\kb\app\conf\Conf;
use com\fall\util\Util;

$movie = Context::$request['movie'];
$md5 = \strtoupper(\md5($movie['imdbid']));
$imgPath = Conf::STATIC_ROOT . '/pic/' . \substr($md5, 0, 2) . '/' . \substr($md5, 2, 2) . '/' . $md5;
$poster = $imgPath . '/poster.jpg';
$preview = $imgPath . '/preview.jpg';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta name="applicable-device" content="pc,mobile"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta charset="UTF-8"/>
        <title><?php echo $movie['name']; ?>-<?php echo $movie['alias']; ?>-九尾龙-磁力链接-种子-迅雷-BT-百度云-网盘-高清-HD-720P-1080P-下载-在线观看-电影-电视剧</title>
        <meta name="keywords" content="<?php echo $movie['name']; ?>,<?php echo $movie['alias']; ?>,九尾龙,磁力链接,种子,迅雷,BT,百度云,网盘,高清,HD,720P,1080P,下载,在线观看,电影,电视剧"/>
        <meta name="description" content="<?php echo $movie['name']; ?>,<?php echo $movie['alias']; ?>,九尾龙,磁力链接,种子,迅雷,BT,百度云,网盘,高清,HD,720P,1080P,下载,在线观看,电影,电视剧,BD,蓝光,<?php echo $movie['type']; ?>,<?php echo $movie['sdate']; ?>,<?php echo $movie['area']; ?>"/>
        <link href="/css/reset.css" type="text/css" rel="stylesheet"/>
        <link href="/css/common.css" type="text/css" rel="stylesheet"/>
        <link href="/css/detail.css" type="text/css" rel="stylesheet"/>
        <!--<script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>-->
    </head>
    <body>
        <?php
//        include $root . '/app/inc/header.php';
        Tool::showAd('admb1');
        ?>


        <div id="container" class="global_clear">
            <div id="subpart">
                <?php
//                include $root . '/app/inc/bdrecpc.php';
//                include $root . '/app/inc/new.php'; 
                ?>
            </div>
            
            <div id="mainpart">
                <div id="movieplate">

                    <h1>
                        <?php echo $movie['name']; ?>
                    </h1>
                    
                    <div id="poster">
                        <a title="<?php echo $movie['name']; ?>" target="_blank" href="<?php echo $poster; ?>">
                            <img class="img" alt="<?php echo $movie['name']; ?>"  src="<?php echo $poster; ?>"/>
                        </a>
                    </div>

                    <div id="infobox" class="global_clear">
                        <p class="date">
                            <span class="title">上映日期：</span>
                            <span class="content">
                                <?php echo $movie['date'] == '0001-01-01' ? '未知' : $movie['date']; ?>
                            </span>
                        </p>

                        <p class="duration">
                            <span class="title">片长：</span>
                            <span class="content">
                                <?php echo $movie['duration']; ?>
                            </span>
                        </p>
                        <p class="score">
                            <span class="title">豆瓣评分：</span>
                            <span class="content">
                                <?php echo $movie['score']/10; ?> 分
                            </span>
                        </p>

                        <p class="types">
                            <span class="title">类型：</span>
                            <span class="content">
                                <?php foreach (\preg_split('/\//', \trim($movie['types'])) as $info) { ?>
                                    <?php if (Util::contains($info, "情色")) { ?>
                                        <a class="qslink" href="/list?type=<?php echo \urlencode('彡级') ?>" target="_blank">彡级</a>
                                        <script type="text/javascript">
                                            $("#infobox a.qslink").html(entxt1);
                                        </script>
                                    <?php } else { ?>
                                        <a href="/list?type=<?php echo \urlencode(\trim($info)); ?>" target="_blank"><?php echo $info; ?></a>
                                    <?php } ?>
                                <?php } ?>
                            </span>
                        </p>

                        <p class="areas">
                            <span class="title">地区：</span>
                            <span class="content">
                                <?php foreach (\preg_split('/\//', \trim($movie['areas'])) as $info) { ?>
                                    <a href="/list?area=<?php echo \urlencode(\trim($info)); ?>" target="_blank"><?php echo $info; ?></a>
                                <?php } ?>
                            </span>
                        </p>

                        <p class="aliases">
                            <span class="title">别名：</span>
                            <span class="content">
                                <?php echo $movie['aliases']; ?>
                            </span>
                        </p>

                        <p class="directors">
                            <span class="title">导演：</span>
                            <span class="content">
                                <?php foreach (\preg_split('/\s+/', \trim($movie['directors'])) as $info) { ?>
                                    <a href="/list?word=<?php echo \urlencode(\trim($info)); ?>" target="_blank"><?php echo $info; ?></a>
                                <?php } ?>
                            </span>
                        </p>

                        <p class="actors">
                            <span class="title">主演：</span>
                            <span class="content">
                                <?php foreach (\preg_split('/\//', \trim($movie['actors'])) as $info) { ?>
                                    <a href="/list?word=<?php echo \urlencode(\trim($info)); ?>" target="_blank"><?php echo $info; ?></a>
                                <?php } ?>
                            </span>
                        </p>
                        <p class="intro">
                            <span class="title">
                                影片简介：
                            </span>
                            <span class="content">
                                <?php echo $movie['intro']; ?>
                            </span>
                        </p>




                        <?php Tool::showAd('adpc3'); ?>

                    </div>




                    <div id="preview">
                        <a title="<?php echo $movie['name']; ?>" target="_blank" href="<?php echo $preview; ?>">
                            <img alt="<?php echo $movie['name']; ?>" src="<?php echo $preview; ?>"/>
                        </a>
                    </div>


                    <?php
                    Tool::showAd('adpc2');
                    Tool::showAd('admb2');

                    $share = array('title' => '《' . $movie['name'] . '》在线观看·下载-九尾龙电影'
                        , 'desc' => '最新最齐全影片，都在【九尾龙电影】！'
                        , 'url' => WorkContext::$requestScheme.'://' . $_SERVER['HTTP_HOST'] . '/movie/' . $movie['id']
                        , 'pic' => $movie['img']);
//                    include $root . '/app/inc/share.php';
                    ?>

                    <div id="playbox" class="global_clear">
                        <span class="title">
                            在线观看·下载地址
                        </span>
                    </div>
                    
                    
                    
                    
                    
                </div>
            </div>


            <?php Tool::showAd('adpc5'); ?>
        </div>






        <?php
//        include $root . '/app/inc/bdrecmb.php';
        Tool::showAd('admb3');

//        include $root . '/app/inc/footer.php';

        Tool::showAd('admbxf2');
        Tool::showAd('adpcxf2');

        Tool::showAd('admb2', true);
        Tool::showAd('admb6', true);
        Tool::showAd('admb3', true);
        Tool::showAd('adpc2', true);
        Tool::showAd('adpc3', true);
        Tool::showAd('adpc4', true);
        Tool::showAd('adpc5', true);
        ?>
        
        <script src="/js/adjs.js"></script>
    </body>
</html>
