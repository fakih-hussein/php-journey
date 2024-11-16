<?php
class Node{
    public $value;
    public $next;

    public function __construct($value){   
        $this->value=$value;
        $this->next=null;
    }
}

class LinkedList{
    public $head;

    public function __construct(){
        $this->head=null;
    }
    
}

?>