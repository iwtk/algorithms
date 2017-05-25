public class LinkedList {
  public static void main(String[] args) {
    Node node = new Node(1);
    node.appendToTail(2);
    node.appendToTail(3);
    node.deleteNode(node, 2);

    while (node != null) {
      System.out.println(node.data);
      node = node.next;
    }
    
    Stack stack = new Stack();
    stack.push(new Integer(4));
    stack.push(new Integer(5));
    stack.push(new Integer(6));
    
    Object popped = stack.pop();
    while (popped != null) {
      System.out.println(popped);
      popped = stack.pop();
    }
    
    Queue queue = new Queue();
    queue.enqueue(new Integer(7));
    queue.enqueue(new Integer(8));
    queue.enqueue(new Integer(9));
    
    Object dequeued = queue.dequeue();
    while (dequeued != null) {
      System.out.println(dequeued);
      dequeued = queue.dequeue();
    }
  }
}

class Node {
  Node next = null;
  int data;
  
  public Node(int d) {
    data = d;
  }
  
  void appendToTail(int d) {
    Node end = new Node(d);
    Node n = this;
    while (n.next != null)
      n = n.next;
    n.next = end;
  }

  Node deleteNode(Node head, int d) {
    Node n = head;

    if (n.data == d)
      return head.next;

    while (n.next != null) {
      if (n.next.data == d) {
        n.next = n.next.next;
        return head;
      }
      n = n.next;
    }
    return head;
  }
}

class Stack {
  Node top;
  
  Object pop() {
    if (top == null) 
      return null;
      
    Object item = top.data;
    top = top.next;
    return item;
  }
  
  void push(Object item) {
    Node t = new Node((int)item);
    t.next = top;
    top = t;
  }
  
  Object peek() {
    return top.data;
  }
}

class Queue {
  Node first, last;
  
  void enqueue(Object item) {
    if (first == null) {
      last = new Node((int)item);
      first = last;
    } else {
      last.next = new Node((int)item);
      last = last.next;
    }
  }
  
  Object dequeue() {
    if (first == null)
      return null;
    
    Object item = first.data;
    first = first.next;
    return item;
  }
}
