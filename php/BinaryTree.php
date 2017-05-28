<?php
class Node {
    public $key;
    public $left;
    public $right;
    
    function __construct($item) {
        $this->key = $item;
        $this->left = $this->right = null;
    }
}

class BinaryTree {
    public static function printPostorder($node) {
        if ($node == null) return;
        
        self::printPostorder($node->left);
        self::printPostorder($node->right);
        echo $node->key . " ";
    }
    
    public static function printInorder($node) {
        if ($node == null) return;
        
        self::printInorder($node->left);
        echo $node->key . " ";
        self::printInorder($node->right);
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "Postorder traversal of binary tree is \n";
BinaryTree::printPostorder($root);
