<?php
namespace com\kb\app\dao;
use com\fall\util\SelectResult;
use com\fall\util\Pagination;
use com\fall\util\Util;
class MovieDAO {

    static function getMovieById($pdo, $id) {
        if ($id < 1) {
            return null;
        }
        $sql = 'select `id`,`imdbid`,`name`,`year`,`duration`,`aliases`,`directors`,`actors`,`tags`,`intro`'
                . ',`areas`,`types`,`score`,`date`,`update`,`fulltext`,`state` from `movie1` '
                . 'where `id` =:id  limit 1;';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $movie = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $movie;
    }

    static function searchMovies($pdo, $word, $order, $page, $paginationLink) {
        $word = trim($word);

        $select = 'select `id`,`imdbid`,`name`,`year`,`duration`,`aliases`,`directors`,`actors`,`tags`,`intro`"
            + ",`areas`,`types`,`score`,`date`,`update`,`state` from `movie1` ';
        $selectCnt = 'select count(*) from `movie1` ';

        $conditions = '';
        $fulltext = '';
        if (!empty($word)) {
            $fulltext = Util::encode($word, true,false, '+');
            $conditions = ' where match(`fulltext`) against(:fulltext IN BOOLEAN MODE) ';
        }

        $orders = '';
        if ($order == "score") {
            $orders = ' order by `score` desc ';
        } else if ($order == 'sdate') {
            $orders = ' order by `date` desc ';
        } else {
            $orders = ' order by `update` desc,`date` desc ';
        }


        $sql0 = $selectCnt . $conditions . ';';
        $stmt0 = $pdo->prepare($sql0);
        if (!empty($fulltext)) {
            $stmt0->bindParam(':fulltext', $fulltext);
        }
        $stmt0->execute();
        $result = $stmt0->fetch(\PDO::FETCH_ASSOC);
        $rowTotalCnt = $result['count(*)'];

        $selectResult = new SelectResult();
        if ($rowTotalCnt > 0) {
            $pagination = new Pagination($rowTotalCnt, $paginationLink, $page);
            $sql = $select . $conditions . $orders . ' limit ' . $pagination->offset . ',' . $pagination->rowCnt . ';';
            $stmt = $pdo->prepare($sql);
            if (!empty($fulltext)) {
                $stmt->bindParam(':fulltext', $fulltext);
            }
            $stmt->execute();
            $movies = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $selectResult->resultList = $movies;
            $selectResult->pagination = $pagination;
        }
        return $selectResult;
    }

}
