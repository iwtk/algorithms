<?php
class Queue {
    protected $queue;
    protected $limit;
    
    public function __construct($values = array(), $limit = 10) {
        $this->queue = array_reverse($values);
        $this->limit = $limit;
    }
    
    public function push($item) {
        if (count($this->queue) < $this->limit) {
            array_unshift($this->queue, $item);
        } else {
            throw new RunTimeException('Queue is full!');
        }
    }
    
    public function pop() {
        if ($this->isEmpty()) {
            throw new RunTimeException('Queue is empty!');
        } else {
            return array_pop($this->queue);
        }
    }
    
    public function top() {
        return current($this->queue);
    }
    
    public function isEmpty() {
        return empty($this->queue);
    }
}

$queue = new Queue();
$queue->push(1);
$queue->push(2);
$queue->push(3);
$queue->push(4);
$queue->push(5);
//$queue = new Queue(array(1, 2, 3, 4, 5), 10);

echo $queue->pop();
echo $queue->pop();
echo $queue->pop();
echo $queue->pop();
echo $queue->pop();
