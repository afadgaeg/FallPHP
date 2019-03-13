<?php
namespace com\fall\util;
class Message {
    public $severity;
    public $summary;
    public $detail;

    const INFO=4;
    const WARN=3;
    const ERROR=2;
    const FATAL=1;
    
    public function __construct($severity, $summary, $detail){
        $this->detail=$detail;
        $this->summary=$summary;
        $this->severity=$severity;
    }
}
