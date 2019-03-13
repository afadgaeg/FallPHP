<?php
namespace com\kb\app\view\movie\inc;
//$ids = '26411410,26322644,1578714,26606242,26667056,11803087,26748673,25937854,20451290,26425072,25824686,25812712,26718838,26857793,25864124,26865362,26907450,25827741';
//$sql = "select `id`,`name`,`duration`,`img`,`score` from `movie` where `id` in(" . $ids . ") order by `sdate` desc;";
//$stmt = $pdo->prepare($sql);
//$stmt->execute();
//$hotMovieObjList = $stmt->fetchAll(PDO::FETCH_ASSOC);
//echo json_encode($hotMovieObjList);
$hotMovieObjList = \json_decode(\com\kb\app\conf\HOT_MOVIE_OBJ_LIST_JSON);
?>

<div id="hotmoviesplate">
    <div class="title">
         热门新片
    </div>
    <div class="content">
        <ul id="hotmovielist" class="global_clear">
            <?php  foreach ($hotMovieObjList as  $hotMovieObj) {?>
            <li>
                <div class="wraper">
                    <div class="imgbox">
                        <div class="img">
                            <a href="/movie/<?php echo $hotMovieObj->id;?>" title="<?php echo $hotMovieObj->name;?>" target="_blank">
                                <?php  if ($hotMovieObj->img != null) {?>
                                <img src="<?php echo  $imgPrefix . $hotMovieObj->img;?>"/>
                                <?php  }?>
                            </a>
                        </div>
                    </div>
                    <dl class="txtbox">
                        <dt title="<?php echo $hotMovieObj->name;?>">
                        <a href="/movie/<?php echo $hotMovieObj->id;?>" title="<?php echo $hotMovieObj->name;?>" target="_blank">
                            <?php echo $hotMovieObj->name;?>
                        </a>
                        </dt>
                    </dl>
                </div>
            </li>
            <?php  }?>
        </ul>
    </div>
    <div class="ctrl">
        +查看全部
    </div>
    <script type="text/javascript">
        var folded = true;
        $("#hotmoviesplate>.ctrl").click(function () {
            if (folded) {
                $("#hotmoviesplate>.content").css("height", "auto");
                $(this).text("-折叠");
                folded = false;
            } else {
                $("#hotmoviesplate>.content").css("height", "200px");
                $(this).text("+查看全部");
                folded = true;
            }
        });
    </script>
</div>