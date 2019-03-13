<?php

namespace com\kb\app\action;

use com\fall\util\Util;
use com\fall\util\Context;
use com\kb\app\dao\MovieDAO;
use com\kb\app\tool\WorkContext;
use com\kb\app\tool\Tool;


class MovieAction {

    private $word;
    private $area;
    private $type;
    private $year;
    private $order;
    private $page;
    private $id;

    function list_() {
        if (Util::bindRequestParamter($this, array('word', 'area', 'type', 'year', 'order', 'page'))) {
            return WorkContext::REQUEST_PARAMTER_ERROR;
        }
        $paginationLink = '';
        if (!empty($this->word)) {
            $this->order = '';
            $paginationLink = '/movie/list?word=' . \urlencode($this->word) . '&page=:page';
        } else {
            $this->word = \trim($this->type . ' ' . $this->area . ' ' . $this->year);
            $paginationLink = '/movie/list?type=' . \urlencode($this->type) . '&area=' . \urlencode($this->area)
                    . '&year=' . \urlencode($this->year) . '&order=' . \urlencode($this->order) . '&page=:page';
        }
        $searchMoviesResult = MovieDAO::searchMovies(Tool::getPDO(), $this->word, $this->order, $this->page, $paginationLink);
        Context::$request['searchMoviesResult'] = $searchMoviesResult;
        
//        Context::getInstance()->request['word'] = $this->word;
//        return Constant::OPERATE_SUCCESS;
        return '/movie/list.php';
    }

    function detail() {
        if (Util::bindRequestParamter($this, array('id'))) {
            return WorkContext::REQUEST_PARAMTER_ERROR;
        }
        $movie = MovieDAO::getMovieById(Tool::getPDO(), $this->id);
        Context::$request['movie'] = $movie;
        if (empty($movie)) {
            return WorkContext::STATUS_CODE_404;
        }
//        return Constant::OPERATE_SUCCESS;
        return '/movie/detail.php';
    }

    function test() {
        
    }

    function __get($property_name) {
        if (isset($this->$property_name)) {
            return ($this->$property_name);
        } else {
            return NULL;
        }
    }

    public function setWord($v) {
        $this->word = $v;
        return false;
    }

    public function setArea($v) {
        $this->area = $v;
        return false;
    }

    public function setType($v) {
        $this->type = $v;
        return false;
    }

    public function setYear($v) {
        $this->year = $v;
        return false;
    }

    public function setOrder($v) {
        $this->order = $v;
        return false;
    }

    public function setPage($v) {
        $this->page = (int) $v;
        return false;
    }
    
    public function setId($v) {
        $this->id = (int) $v;
        return false;
    }

}
