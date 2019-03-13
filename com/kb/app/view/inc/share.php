<?php
namespace com\kb\app\view\inc;
use com\fall\util\Context;
$share = Context::getInstance()->request['share'];
?>
<div id="share">
    <div class="bdsharebuttonbox" data-tag="share">
        <span class="title">分享到：</span>
        <a class="bds_mshare" data-cmd="mshare"></a>
        <a class="bds_tieba" data-cmd="tieba"></a>
        <a class="bds_douban" data-cmd="douban"></a>
        <a class="bds_ty" data-cmd="ty"></a>
        <a class="bds_sqq" data-cmd="sqq"></a>
        <a class="bds_qzone" data-cmd="qzone" href="#"></a>
        <a class="bds_weixin" data-cmd="weixin"></a>
        <a class="bds_tsina" data-cmd="tsina"></a>
        <a class="bds_tqq" data-cmd="tqq"></a>
        <a class="bds_baidu" data-cmd="baidu"></a>
        <a class="bds_bdhome" data-cmd="bdhome"></a>
        <a class="bds_renren" data-cmd="renren"></a>
        <a class="bds_more" data-cmd="more">更多</a>
        <a class="bds_count" data-cmd="count"></a>
    </div>
    <script type="text/javascript">
        window._bd_share_config = {
            common: {
                bdText: '<?php echo $share['title'];?>',
                bdDesc: '<?php echo $share['desc'];?>',
                bdUrl: '<?php echo $share['url'];?>',
                bdPic: '<?php echo $share['pic'];?>'

            },
            share: [{
                    "tag": "share",
                    "bdSize": 32
                }]
        };
        with (document)0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion=' + ~(-new Date() / 36e5)];
    </script>
</div>


