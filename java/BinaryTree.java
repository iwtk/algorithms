class Node {
  int key;
  Node left, right;
  
  public Node(int item) {
    key = item;
    left = right = null;
  }
}

public class BinaryTree {
  public static void printPostorder(Node node) {
    if (node == null) return;
    
    printPostorder(node.left);
    printPostorder(node.right);
    System.out.print(node.key + " ");
  }
  
  public static void printInorder(Node node) {
    if (node == null) return;
    
    printInorder(node.left);
    System.out.print(node.key + " ");
    printPostorder(node.right);
  }
  
  public static void printPreorder(Node node) {
    if (node == null) return;
    
    System.out.print(node.key + " ");
    printInorder(node.left);
    printPostorder(node.right);
  }
  
  public static void main(String[] args) {
    Node root = new Node(1);
    root.left = new Node(2);
    root.right = new Node(3);
    root.left.left = new Node(4);
    root.left.right = new Node(5);
    
    System.out.println("Preorder traversal of binary tree is ");
    printPreorder(root);
    
    System.out.println("\nInorder traversal of binary tree is ");
    printInorder(root);
    
    System.out.println("\nPostorder traversal of binary tree is ");
    printPostorder(root);
  }
}
