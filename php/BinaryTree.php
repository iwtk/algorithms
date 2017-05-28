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
    public static function printPreorder($node) {
        if ($node == null) return;
        
        echo $node->key . " ";
        self::printPreorder($node->left);
        self::printPreorder($node->right);
    }
    
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
$root->right->left = new Node(6);
$root->right->right = new Node(7);

echo "Prerder traversal of binary tree is \n";
BinaryTree::printPreorder($root);
echo "\nPostorder traversal of binary tree is \n";
BinaryTree::printPostorder($root);
echo "\nInorder traversal of binary tree is \n";
BinaryTree::printInorder($root);
