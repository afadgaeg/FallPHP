<?php
namespace com\kb\app\view;
use com\kb\app\tool\WorkContext;
\header('HTTP/1.1 404 Not Found');
\header('status: 404 Not Found');
//header("Content-Type: text/html;charset=utf-8");
$homepage = WorkContext::$requestScheme.'://' . $_SERVER['HTTP_HOST'] . '/';
$currentUrl= WorkContext::$requestScheme.'://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="applicable-device" content="pc,mobile"/>
        <title>404</title>
        <style type="text/css">
            body { font: 14px 宋体 }
            h1 { font: 23px 宋体 }
            a:visited { color: maroon }
            a:link { color: red }
            #container{
                margin:100px auto;width:100%;max-width: 600px;
            }
            #cnt{ color:#FF0000; font-size:19px; font-weight:bold}
            #container em{font-weight: bold;color:#007C00;font-size: 16px;}
        </style>
        <script type="text/javascript">
            function out(i) {
                if (i == 0) {
                    document.location.href = "<?php echo $homepage; ?>";
                }
                document.getElementById("cnt").innerHTML = i;
                i--;
                setTimeout("out(" + i + ")", 1000);
            }
//            window.onload=function(){out(5);};
        </script>
    </head>
    <body>
        <div id="container">
            <h1>页面走丢了！</h1>
            <p>
                <em>但是回忆永不丢失！</em>
            </p>
            <p>
                <span id="cnt"></span>秒后进入九尾龙主页，或直接点击进入<a href="<?php echo $homepage; ?>" title="九尾龙电影首页"><?php echo $homepage; ?></a>
            </p>
        </div>
    </body>
</html>

<?php exit;






