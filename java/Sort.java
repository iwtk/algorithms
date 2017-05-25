public class Sort {
  public static void main(String[] args) {
    int arr[] = {8, 3, 1, 2, 7, 5, 6, 4};
    //bubbleSort(arr);
    //insertionSort(arr);
    //selectionSort(arr);
    //shellSort(arr);
    //quickSort(arr, 0, arr.length-1);
    mergeSort(arr, 0, arr.length-1);
    for (int v: arr)
      System.out.println(v);
  }
  
  public static void bubbleSort(int[] arr) {
    for (int i = arr.length - 1; i >= 1; i--)
      for (int j = 0; j < i; j++)
        if (arr[j] > arr[j+1]) swap(arr, j, j+1);
  }
  
  public static void insertionSort(int[] arr) {
    for (int i = 1; i < arr.length; i++)
      for (int j = i-1; j >= 0; j--) {
        if (arr[j] < arr[j+1]) break;
        swap(arr, j, j+1);
      }
  }
  
  public static void selectionSort(int[] arr) {
    for (int i = 0; i < arr.length - 1; i++)
      for (int j = i+1; j < arr.length; j++)
        if (arr[i] > arr[j]) swap(arr, i, j);
  }
  
  public static void shellSort(int[] arr) {
    int[] gaps = {8, 4, 2, 1};
    for (int g : gaps)
      for (int i = g; i < arr.length; i += g)
        for (int j = i; j >= g; j -= g) {
          if (arr[j-g] < arr[j]) break;
          swap(arr, j, j-g);
        }
  }
  
  public static void quickSort(int arr[], int left, int right) {
    if (left >= right) return;
    
    int index = partition(arr, left, right);
    quickSort(arr, left, index - 1);
    quickSort(arr, index, right);
  }
  
  public static int partition(int arr[], int left, int right) {
    int pivot = arr[(left + right) / 2];
    
    while (left <= right) {
      while (arr[left] < pivot) left++;
      while (arr[right] > pivot) right--;
      if (left <= right) {
        swap(arr, left, right);
        left++;
        right--;
      }
    }
    return left;
  }
  
  public static void mergeSort(int[] arr, int low, int high) {
    if (low >= high) return;
    
    int middle = (low + high) / 2;
    mergeSort(arr, low, middle);
    mergeSort(arr, middle + 1, high);
    merge(arr, low, middle, high);
  }
  
  public static void merge(int[] arr, int low, int middle, int high) {
    int[] helper = new int[arr.length];
    
    for (int i = low; i <= high; i++)
      helper[i] = arr[i];
    
    int helperLeft = low;
    int helperRight = middle + 1;
    int current = low;
    
    while (helperLeft <= middle && helperRight <= high) {
      if (helper[helperLeft] <= helper[helperRight]) {
        arr[current] = helper[helperLeft];
        helperLeft++;
      } else {
        arr[current] = helper[helperRight];
        helperRight++;
      }
      current++;
    }
    
    for (int i = 0; i <= middle - helperLeft; i++)
      arr[current + i] = helper[helperLeft + i];
  }
  
  public static void swap(int[] arr, int a, int b) {
    int tmp = arr[a];
    arr[a] = arr[b];
    arr[b] = tmp;
  }
}
