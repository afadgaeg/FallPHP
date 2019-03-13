<?php

namespace com\fall\util;
use com\fall\util\Message;
class Messages {
    private $keyedMessages;
    private $messages;
    
    function __get($property_name) {
        if (isset($this->$property_name)) {
            return ($this->$property_name);
        } else {
            return NULL;
        }
    }
    
    public function addToControl($key, $severity, $summary, $detail) {
        $message = new Message($severity, $summary, $detail);
        if (\array_key_exists($key, $this->keyedMessages)) {
            $this->keyedMessages[$key][]=$message;
        } else {
            $messages[]=$message;
            $this->keyedMessages[$key]= $messages;
        }
    }
    
    public function clearAndAdd($severity, $summary, $detail) {
        $this->clear();
        $this->add($severity, $summary, $detail);
    }

    public function add($severity, $summary, $detail) {
        $this->messages[]=new Message($severity, $summary, $detail);
    }

    public function clear() {
        unset($this->keyedMessages);
        unset($this->messages);
    }
}
