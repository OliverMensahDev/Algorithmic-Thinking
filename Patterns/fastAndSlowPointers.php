<?php 

class Node {
    public int $value;
    public ?Node $next;
    public function __construct(int $value, ?Node $next = null)
    {
      $this->value = $value;
      $this->next = $next;
    }
  }
  
function has_cycle (Node $head) {
    $slow = $head;
    $fast = $head;
  while ($fast !== null && $fast->next !== null) {
    $fast = $fast->next->next;
    $slow = $slow->next;
    if ($slow === $fast) {
      return true; // found the cycle
    }
  }
  return false;
};
  

function find_cycle_length (Node $head) {
    $slow = $head;
    $fast = $head;
  while ($fast !== null && $fast->next !== null) {
    $fast = $fast->next->next;
    $slow = $slow->next;
    if ($slow === $fast) {
      return calculate_cycle_length($slow);
    }
  }
  return 0;
};
  
function calculate_cycle_length(Node $slow) {
    $current = $slow;
    $cycle_length = 0;
    while (true) {
      $current = $current->next;
      $cycle_length += 1;
      if ($current === $slow) {
        break;
      }
    }
    return $cycle_length;
  }
  $head = new Node(1);
  $head->next = new Node(2);
  $head->next->next = new Node(3);
  $head->next->next->next = new Node(4);
  $head->next->next->next->next = new Node(5);
  $head->next->next->next->next->next = new Node(6);
 
  
  echo "LinkedList has cycle: " . (int) has_cycle($head) ."\n";
  
  $head->next->next->next->next->next->next = $head->next->next;
  echo "LinkedList has cycle: " . (int) has_cycle($head)  ."\n";

  
  $head->next->next->next->next->next->next = $head->next->next->next;
  echo "LinkedList has cycle: " . (int) has_cycle($head)  ."\n";


  $head = new Node(1);
  $head->next = new Node(2);
  $head->next->next = new Node(3);
  $head->next->next->next = new Node(4);
  $head->next->next->next->next = new Node(5);
  $head->next->next->next->next->next = new Node(6);
  echo "Length of cycle: " . find_cycle_length($head) ."\n";
  
  $head->next->next->next->next->next->next = $head->next->next;
  echo "Length of cycle: " . find_cycle_length($head)  ."\n";

  
  $head->next->next->next->next->next->next = $head->next->next->next;
  echo "Lenght of cycle: " . find_cycle_length($head)  ."\n";