<?php
namespace com\kb\app\view\movie\inc;
use com\kb\app\tool\WorkContext;
?>
<div id="footer"> 
    <div class="copyright">
        <p>本站拒绝一切非法，淫秽电影！欢迎大家监督，本站所有资源来源于网友交流，只供网络测试，并不存放任何资源，请在24小时内删除所下内容，开始清理无版权的内容，我们强烈建议所有影视爱好者购买正版音像制品!</p>
        <p>Copyright © 2016 <?php echo WorkContext::$requestScheme.'://'.$_SERVER['HTTP_HOST'].'/'; ?></p>
    </div>
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?f407fda5e77c7df9b35d2e83bbee2d6a";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <script>
        (function () {
            var bp = document.createElement('script');
            var curProtocol = window.location.protocol.split(':')[0];
            if (curProtocol === 'https') {
                bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
            }
            else {
                bp.src = 'http://push.zhanzhang.baidu.com/push.js';
            }
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(bp, s);
        })();
    </script>
</div>