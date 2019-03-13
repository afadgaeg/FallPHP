<?php

namespace com\fall\util;

use com\fall\util\Util;

class Pagination {

    public $page;
    public $rowTotalCnt;
    public $link;
    public $rowCnt;
    public $pageParamName;
    public $pageTotalCnt;
    public $offset;

    public function __construct($rowTotalCnt, $link, $page = 1, $rowCnt = 24) {
        $this->rowTotalCnt = $rowTotalCnt;
        $this->link = $link;
        $this->rowCnt = $rowCnt;
        $this->pageTotalCnt = ceil($rowTotalCnt / $rowCnt);
        if ($page < 1) {
            $page = 1;
        }
        if ($page > $this->pageTotalCnt) {
            $page = $this->pageTotalCnt;
        }
        $this->page = $page;
        $this->offset = ($page - 1) * $rowCnt;
    }

    public function getLink($p) {
        return Util::cutQS(preg_replace('/:page/', $p, $this->link, 1));
    }

}
