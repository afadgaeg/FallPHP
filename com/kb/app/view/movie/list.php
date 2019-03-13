<?php

namespace com\kb\app\view\movie;
use com\kb\app\tool\WorkContext;
use com\kb\app\tool\Tool;
use com\fall\util\Util;
use com\fall\util\Context;
use com\kb\app\conf\Conf;

$rowTotalCntMovies = 0;
$movieList = null;
$moviesPagination = null;
$searchMoviesResult = Context::$request['searchMoviesResult'];
if (!empty($searchMoviesResult)) {
    $movieList = $searchMoviesResult->resultList;
    $moviesPagination = $searchMoviesResult->pagination;
    $rowTotalCntMovies = $moviesPagination->rowTotalCnt;
}
$word = Util::getInput('word');
$type = Util::getInput('type');
$area = Util::getInput('area');
$year = Util::getInput('year');
$order = Util::getInput('order');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta charset="UTF-8"/>
        <title><?php echo $word; ?>-<?php echo $type; ?>-<?php echo $area; ?>-九尾龙-磁力链接-种子-迅雷-BT-百度云-网盘-高清-HD-720P-1080P-下载-在线观看-电影-电视剧</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="applicable-device" content="pc,mobile"/>
        <meta name="keywords" content="<?php echo $word; ?>,<?php echo $type; ?>,<?php echo $area; ?>,九尾龙,磁力链接,种子,迅雷,BT,百度云,网盘,高清,HD,720P,1080P,下载,在线观看,电影,电视剧"/>
        <meta name="description" content="<?php echo $word; ?>,<?php echo $type; ?>,<?php echo $area; ?>,九尾龙,磁力链接,种子,迅雷,BT,百度云,网盘,高清,HD,720P,1080P,下载,在线观看,电影,电视剧"/>
        <link href="/css/reset.css" type="text/css" rel="stylesheet"/>
        <link href="/css/common.css" type="text/css" rel="stylesheet"/>
        <link href="/css/list.css" type="text/css" rel="stylesheet"/>
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
                <div id="resultsbox">
                    <div id="sortplate">
                        <div class="title">稀恐筛选</div>
                        <div class="content">
                            <div class="type subplate global_clear">
                                <div class="t">
                                    <span class="sort_name">类型：</span>
                                </div>
                                <div class="c">
                                    <?php if (empty($type)) { ?>
                                        <span class="current">全部</span>
                                    <?php } else { ?>
                                        <a href="<?php echo Util::cutQS('/movie/list?area=' . \urlencode($area) . '&year=' . $year . '&order=' . $order); ?>">
                                            全部
                                        </a>
                                    <?php } ?>
                                    <?php foreach (Conf::$typeList as $value) { ?>
                                        <?php if ($value == $type) { ?>
                                            <span class="current"><?php echo $value ?></span>
                                        <?php } else { ?>
                                            <a href="<?php echo Util::cutQS('/movie/list?type=' . \urlencode($value) . '&area=' . \urlencode($area) . '&year=' . $year . '&order=' . $order); ?>">
                                                <?php echo $value; ?>
                                            </a>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="subplate global_clear">
                                <div class="t">
                                    <span class="sort_name">地区：</span>
                                </div>
                                <div class="c">
                                    <?php if (empty($area)) { ?>
                                        <span class="current">全部</span>
                                    <?php } else { ?>
                                        <a href="<?php echo Util::cutQS('/movie/list?type=' . \urlencode($type) . '&year=' . $year . '&order=' . $order); ?>">
                                            全部
                                        </a>
                                    <?php } ?>
                                    <?php foreach (Conf::$areaList as $value) { ?>
                                        <?php if ($value == $area) { ?>
                                            <span class="current"><?php echo $value ?></span>
                                        <?php } else { ?>
                                            <a href="<?php echo Util::cutQS('/movie/list?type=' . \urlencode($type) . '&area=' . \urlencode($value) . '&year=' . $year . '&order=' . $order); ?>">
                                                <?php echo $value; ?>
                                            </a>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="subplate global_clear">
                                <div class="t">
                                    <span class="sort_name">年代：</span>
                                </div>
                                <div class="c">
                                    <?php if ($year == '') { ?>
                                        <span class="current">全部</span>
                                    <?php } else { ?>
                                        <a href="<?php echo Util::cutQS('/movie/list?type=' . \urlencode($type) . '&area=' . \urlencode($area) . '&order=' . $order); ?>">
                                            全部
                                        </a>
                                    <?php } ?>
                                    <?php foreach (Conf::$yearMap as $key => $value) { ?>
                                        <?php if ($year != '' && $key == $year) { ?>
                                            <span class="current"><?php echo $value; ?></span>
                                        <?php } else { ?>
                                            <a href="<?php echo Util::cutQS('/movie/list?type=' . \urlencode($type) . '&area=' . \urlencode($area) . '&year=' . $key . '&order=' . $order); ?>">
                                                <?php echo $value; ?>
                                            </a>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="subplate global_clear">
                                <div class="t">
                                    <span class="sort_name">排序：</span>
                                </div>
                                <div class="c">
                                    <?php if ($order == '') { ?>
                                        <span class="current">最近更新</span>
                                    <?php } else { ?>
                                        <a href="<?php echo Util::cutQS('/movie/list?word=' . \urlencode($word) . '&type=' . \urlencode($type) . '&area=' . \urlencode($area) . '&year=' . $year); ?>">
                                            最近更新
                                        </a>
                                    <?php } ?>
                                    <?php if ($order == 'date') { ?>
                                        <span class="current">上映时间</span>
                                    <?php } else { ?>
                                        <a href="<?php echo Util::cutQS('/movie/list?word=' . \urlencode($word) . '&type=' . \urlencode($type) . '&area=' . \urlencode($area) . '&year=' . $year . '&order=date'); ?>">
                                            上映时间
                                        </a>
                                    <?php } ?>
                                    <?php if ($order == 'score') { ?>
                                        <span class="current">最高评分</span>
                                    <?php } else { ?>
                                        <a href="<?php echo Util::cutQS('/movie/list?word=' . \urlencode($word) . '&type=' . \urlencode($type) . '&area=' . \urlencode($area) . '&year=' . $year . '&order=score'); ?>">
                                            最高评分
                                        </a>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
<!--                    <script type="text/javascript">
                        $("#sortplate .type a:contains('彡级')").html(entxt1);
                        $("#sortplate .type span:contains('彡级')").html(entxt1);
                    </script>-->

                    <?php
                    Tool::showAd('adpc2');
                    Tool::showAd('admb2');
                    $share = array('title' => '最新最齐全影片，都在【九尾龙电影】！'
                        , 'desc' => '最新最齐全影片，都在【九尾龙电影】！'
                        , 'url' => WorkContext::$requestScheme.'://' . $_SERVER['HTTP_HOST'] . '/'
                        , 'pic' => WorkContext::$requestScheme.'://' . $_SERVER['HTTP_HOST'] . '/img/logo.png');
//                    include $siteRoot . '/app/inc/share.php';
                    ?>

                    <div id="resultsplate">

                        <div class="title">

                            电影列表：[共 <em><?php echo $rowTotalCntMovies; ?></em> 部电影]
                            <?php if ($moviesPagination != null && $moviesPagination->rowTotalCnt > 0) { ?>
                                [第 <em><?php echo $moviesPagination->page; ?></em>/<em><?php echo $moviesPagination->pageTotalCnt; ?></em> 页]
                            <?php } ?>
                            <?php if (!empty($word)) { ?>
                                [关键词：<em><?php echo $word; ?></em>]
                            <?php } ?>


                        </div>
                        <div class="content">
                            <?php if (!empty($movieList)) { ?>
                                <div id="moviesplate" class="subplate">
                                    <ul class="list">
                                        <?php $cntMovie = \count($movieList); ?>
                                        <?php for ($i = 0; $i < $cntMovie; $i++) { ?>
                                            <?php
                                            $m = $movieList[$i];
                                            $md5 = \strtoupper(\md5($m['imdbid']));
                                            ?>
                                            <li class="row global_clear">
                                                <h1 class="title">
                                                    <a class="name" href="/movie/<?php echo $m['id']; ?>" title="<?php echo $m['name']; ?>" target="_blank">
                                                        <?php echo $m['name']; ?>
                                                    </a>
                                                </h1>
                                                <div class="info1">
                                                    <span><?php echo $m['date'] == '1000-01-01' ? '' : $m['date']; ?></span>
                                                    |
                                                    <span><?php echo $m['duration']; ?></span>
                                                    |
                                                    <span><?php echo $m['score'] / 10; ?>分</span>
                                                    |
                                                    <span>
                                                        <?php if (!empty($m['types'])) { ?>
                                                            <?php foreach (\preg_split('/\//', \trim($m['types'])) as $info) { ?>
                                                                <?php if (!Util::contains($info, '情色')) { ?>
                                                                    <?php echo \trim($info); ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </span>
                                                    |
                                                    <span>
                                                        <?php if (!empty($m['areas'])) { ?>
                                                            <?php foreach (\preg_split('/\//', \trim($m['areas'])) as $info) { ?>
                                                                <?php echo \trim($info); ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </span>



                                                </div>
                                                <div class="img">
                                                    <a href="/movie/<?php echo $m['id']; ?>" title="<?php echo $m['name']; ?>" target="_blank">
                                                        <img src="<?php echo Conf::STATIC_ROOT . '/pic/' . \substr($md5, 0, 2) . '/' . \substr($md5, 2, 2) . '/' . $md5 . '/poster.jpg'; ?>"/>
                                                    </a>
                                                </div>
                                                <div class="info2">
                                                    <p>
                                                        <span>别名：</span><span><?php echo $m['aliases']; ?></span>
                                                    </p>
                                                    <p>
                                                        <span>导演：</span>
                                                        <span>
                                                            <?php if (!empty($m['directors'])) { ?>
                                                                <?php foreach (\preg_split('/\//', \trim($m['directors'])) as $info) { ?>
                                                                    <?php echo \trim($info); ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </span>
                                                    </p>
                                                    <p>
                                                        <span>主演：</span>
                                                        <span>
                                                            <?php if (!empty($m['actors'])) { ?>
                                                                <?php foreach (\preg_split('/\//', \trim($m['actors'])) as $info) { ?>
                                                                    <?php echo \trim($info); ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </span>
                                                    </p>

                                                </div>
                                            </li>
                                            <?php if ($i == 2 || ($cntMovie < 3 && $i == $cntMovie - 1)) { ?>
                                                <li class="row adwp1">
                                                    <?php
                                                    Tool::showAd('adpc4');
                                                    Tool::showAd('admb6');
                                                    ?>
                                                </li>
                                            <?php } ?>
                                        <?php } ?>
                                    </ul>
                                    <?php if ($moviesPagination != null && $moviesPagination->rowTotalCnt > 0) { ?>
                                        <div class="cls_pagination">
                                            <?php
                                            Context::$request['pagination'] = $moviesPagination;
                                            include WorkContext::$viewRoot . '/inc/pagination.php';
                                            ?>
                                        </div>
                                        <script type="text/javascript">
                                            $("#moviesplate>.cls_pagination a").each(function () {
                                                $(this).attr("target", "_blank");
                                            });
                                        </script>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
                <?php Tool::showAd('adpc5'); ?>


            </div>

        </div>

        <?php
//        include $root . '/app/inc/bdrecmb.php';
        Tool::showAd('admb3');
//        include $root . '/app/inc/footer.php';
        Tool::showAd('admbxf1');
        Tool::showAd('adpcxf1');

        Tool::showAd('admb2', true);
        Tool::showAd('admb6', true);
        Tool::showAd('adpc2', true);
        Tool::showAd('adpc4', true);
        Tool::showAd('adpc5', true);
        ?>
        <script src="/js/adjs.js"></script>

    </body>
</html>