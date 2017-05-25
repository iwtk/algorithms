class IntQueue {
  private int size;
  private int[] data;
  private int top;
  private int maxSize;
  
  public IntQueue(int maxSize) {
    this.maxSize = maxSize;
    this.top = 0;
    this.data = new int[maxSize];
    this.size = 0;
  }
  
  public void enqueue(int item) {
    this.data[(this.top + this.size) % this.maxSize] = item;
    this.size++;
  }
  
  public int dequeue() {
    int item = this.data[this.top];
    this.top = (this.top + 1) % this.maxSize;
    this.size--;
    return item;
  }
  
  public int getSize() {
    return this.size;
  }
}
  
public class Main {
  public static void main(String[] args) {
    IntQueue queue = new IntQueue(3);
    
    queue.enqueue(10);
    queue.enqueue(5);
    queue.enqueue(3);
    
    System.out.println(queue.dequeue());
    System.out.println(queue.getSize());
    
    System.out.println(queue.dequeue());
    System.out.println(queue.getSize());
    
    queue.enqueue(4);
    System.out.println(queue.dequeue());
    System.out.println(queue.getSize());
    
    System.out.println(queue.dequeue());
    System.out.println(queue.getSize());
  }
}
