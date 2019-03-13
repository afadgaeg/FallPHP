<?php
namespace com\kb\app\view\inc;
use com\fall\util\Context;
use com\fall\util\Util;
$pagination = Context::$request['pagination'];
?>
<div>
    <a class="page" href ="<?php echo $pagination->getLink(1); ?>">首页</a>
    <?php if ($pagination->page > 1) { ?>
        <a class="page" href ="<?php echo $pagination->getLink($pagination->page - 1) ?>">上一页</a>
    <?php } else { ?>
        <span class="page">上一页</span>
    <?php } ?>
    <?php for ($i = $pagination->page - 4; $i < $pagination->page; $i++) { ?>
        <?php if ($i > 0) { ?>
            <a class="page" href ="<?php echo $pagination->getLink($i); ?>"> <?php echo $i; ?> </a>
        <?php } ?>
    <?php } ?>
    <span class="current page"> <?php echo $pagination->page; ?> </span>
    <?php for ($i = $pagination->page + 1; $i < $pagination->page + 5 && $i <= $pagination->pageTotalCnt; $i++) { ?>
        <a class="page" href ="<?php echo $pagination->getLink($i); ?>"> <?php echo $i; ?> </a>
    <?php } ?>
    <?php if ($pagination->page < $pagination->pageTotalCnt) { ?>
        <a class="page" href = " <?php echo $pagination->getLink($pagination->page + 1); ?> ">下一页&gt;</a>
    <?php } else { ?>
        <span class="page">下一页&gt;</span>
    <?php } ?>
    <a class="page" href=" <?php echo $pagination->getLink($pagination->pageTotalCnt); ?>">&gt;&gt; <?php echo $pagination->pageTotalCnt; ?></a>
    <?php
    $next = $pagination->page == $pagination->pageTotalCnt ? $pagination->page : $pagination->page + 1;
    $random = "id_" . Util::getRandomString(5);
    ?>
    到第<input id="<?php echo $random; ?>" class="page page_input" type="text" name="page" value="<?php echo $next; ?>"/>页
    <input class="page page_sbmt" type="button" value="跳转" onclick="javascript:location.href = '<?php echo cutQS($pagination->link); ?>'.replace(/:page/g, getElementById('<?php echo $random; ?>').value);"/>
</div>
