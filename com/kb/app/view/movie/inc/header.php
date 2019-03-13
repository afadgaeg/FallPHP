<?php
namespace com\kb\app\view\movie\inc;
use com\fall\util\Util;
$navList = array('剧情', '喜剧', '动作', '爱情', '惊悚', '犯罪', '恐怖', '冒险', '悬疑', '彡级', '家庭', '奇幻', '科幻', '动画', '战争', '历史', '古装');
?>
<script type="text/javascript">
    function deEight(txt) {
        var monyer = "";
        var s = txt.split("\\");
        for (var i = 1; i < s.length; i++) {
            monyer += String.fromCharCode(parseInt(s[i], 8));
        }
        return monyer;
    }
    var entxt1 = deEight("\\60305\\101162");
</script>
<div id="header">
    <div id="topbar" class="global_clear">
        <?php echo \com\kb\app\conf\QQ_GROUP_HTML; ?>
    </div>
    <div id="headbar" class="global_clear">
        <div id="logo">
            <a href="/" title="九尾龙">
                <img class="pngimg" src="/img/logo.png" alt="九尾龙"/>
            </a>
        </div>
        <div id="searchbar">
            <div class="search">
                <form action="/list" method="get">
                    <input class="inputtxt" type="text" name="word" value="<?php echo Util::getInput('word'); ?>"/>
                    <input class="inputsbmt" type="submit" value="搜影视"/>
                </form>
            </div>
            <script type="text/javascript">
                var mskey = '片名/类型/演员/年份/地区/导演';
                $search_bar_input_txt = $("#searchbar .inputtxt").first();
                if ($search_bar_input_txt.val() == '') {
                    $search_bar_input_txt.val(mskey);
                }
                $search_bar_input_txt.focus(function () {
                    if ($(this).val() == mskey) {
                        $(this).val('');
                    }
                });
                $search_bar_input_txt.focusout(function () {
                    if ($(this).val() == '') {
                        $(this).val(mskey);
                    }
                });
            </script>
        </div>
    </div>
    <div id="hotkeyplate">
        <span class="tip">热搜：</span>
        <?php foreach (\com\kb\app\conf\HOT_MOVIE_LIST as $hotMovie) { ?>
            <a href="/list?word=<?php echo \urlencode($hotMovie); ?>" title="<?php echo $hotMovie; ?>"><?php echo $hotMovie; ?></a>&nbsp;
        <?php } ?>
    </div>   

    <div id="navbar" class="global_clear">
        <ul>
            <li class="index">
                <a href="/">首页</a>
            </li>
            <?php foreach ($navList as $nav) { ?>
                <li class="type">
                    <a href="/list?type=<?php echo \urlencode($nav); ?>">
                        <?php echo $nav; ?>
                    </a>
                    <?php if ($nav == '彡级') { ?>
                        <span class="hot"></span>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    </div>
    <script type="text/javascript">
        $("#navbar a:contains('彡级')").html(entxt1);
    </script>
</div>


