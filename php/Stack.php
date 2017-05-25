<?php
class Stack {
    protected $stack;
    protected $limit;
    
    public function __construct($values = array(), $limit = 10) {
        $this->stack = array_reverse($values);
        $this->limit = $limit;
    }
    
    public function push($item) {
        if (count($this->stack) < $this->limit) {
            array_unshift($this->stack, $item);
        } else {
            throw new RunTimeException('Stack is full!');
        }
    }
    
    public function pop() {
        if ($this->isEmpty()) {
            throw new RunTimeException('Stack is empty!');
        } else {
            return array_shift($this->stack);
        }
    }
    
    public function top() {
        return current($this->stack);
    }
    
    public function isEmpty() {
        return empty($this->stack);
    }
}

$stack = new Stack();
$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->push(4);
$stack->push(5);
//$stack = new Stack(array(1, 2, 3, 4, 5), 10);

echo $stack->pop();
echo $stack->pop();
echo $stack->pop();
echo $stack->pop();
echo $stack->pop();
