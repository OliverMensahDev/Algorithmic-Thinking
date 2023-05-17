<?php 
class Node {
    private int $value;
    public ?Node $next;
    public function __construct(int $value, ?Node $next = null) {
      $this->value = $value;
      $this->next = $next;
    }
  
    function printList() {
        $values = [];
        $temp = $this;
        while ($temp !== null) {
         $values[] =  $temp->value;
         $temp = $temp->next;
      }
      return $values;
    }
}
  
  
function reverse(Node $head) 
{
    $current = $head;
    $previous = null;
    while ($current !== null) {
      $next = $current->next; // temporarily store the next node
      $current->next = $previous; // reverse the current node
      $previous = $current; // before we move to the next node, point previous to the current node
      $current = $next; // move on the next node
    }
    return $previous;
  }
  
  
$head = new Node(2, new Node(4, new Node(6, new Node(8, new Node(10)))));

  
echo json_encode($head->printList()) . PHP_EOL;
$result = reverse($head);
echo json_encode($result->printList()) . PHP_EOL;


function reverseSubList(Node $head, int $p, int $q) 
{
  if ($p === $q) {
    return $head;
  }

  // after skipping 'p-1' nodes, current will point to 'p'th node
  $current = $head;
  $previous = null;
  $i = 0;
  while ($current !== null && $i < $p - 1) {
    $previous = $current;
    $current = $current->next;
    $i += 1;
  }

  // we are interested in three parts of the LinkedList, the part before index 'p',
  // the part between 'p' and 'q', and the part after index 'q'
   $lastNodeOfFirstPart = $previous;
  // after reversing the LinkedList 'current' will become the last node of the sub-list
  $lastNodeOfSubList = $current;
  
  $next = null; // will be used to temporarily store the next node

  $i = 0;
  // reverse nodes between 'p' and 'q'
  while ($current !== null && $i < $q - $p + 1) {
    $next = $current->next;
    $current->next = $previous;
    $previous = $current;
    $current = $next;
    $i += 1;
  }

  // connect with the first part
  if ($lastNodeOfFirstPart !== null) {
    // 'previous' is now the first node of the sub-list
    $lastNodeOfFirstPart->next = $previous;
    // this means p === 1 i.e., we are changing the first node (head) of the LinkedList
  } else {
    $head = $previous;
  }

  // connect with the last part
  $lastNodeOfSubList->next = $current;

  return $head;
}

$result = reverseSubList($head, 2, 4);
echo json_encode($result->printList()) . PHP_EOL;