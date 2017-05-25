<?php
class Node {
    public $data;
    public $next;
    
    function __construct($item) {
        $this->data = $item;
        $this->next = null;
    }
}

class LinkedList {
    public $head = null;
    
    public function insertFirst($item) {
        if ($this->head == null) {
            $this->head = new Node($item);
        } else {
            $tmp = new Node($item);
            $tmp->next = $this->head;
            $this->head = $tmp;
        }
    }
    
    public function deleteNode($key) {
        if ($this->head->data == $key)
            $this->head = $this->head->next;
        
        $current = $this->head;
        while ($current->next != null) {
            if ($current->next->data == $key) {
                $current->next = $current->next->next;
                return;
            }
                
            $current = $current->next;
        }
    }
    
    public function printAsList() {
        $current = $this->head;
        while ($current != null) {
            echo $current->data . '->';
            $current = $current->next;
        }
    }
}

$ll = new LinkedList();

$ll->insertFirst(3);
$ll->insertFirst(4);
$ll->insertFirst(5);
$ll->deleteNode(5);

$ll->printAsList();
