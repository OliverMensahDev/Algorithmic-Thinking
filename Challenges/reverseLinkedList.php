<?php 

class Node{
  public int $value;
  public ?Node $next;
  
  public function __construct(int $value, ?Node $next = null)
  {
    $this->value = $value;
    $this->next = $next;
  }
}

$head = new Node(1);
$head->next = new Node(2);
$head->next->next = new Node(3);
$head->next->next->next = new Node(4);
$head->next->next->next->next = new Node(5);
$head->next->next->next->next->next = new Node(6);

function reverse($head){
  $prev = null;
  $next = null;
  $current = $head;
  while($current != null){
    $next = $current->next;
    $current->next = $prev;
    $prev = $current;
    $current = $next;
  }
  $head = $prev;
  return $head;
}

$list = reverse($head);
$value = '';
while($list != null){
    $value .= $list->value . '->';
    $list = $list->next;
}
echo $value . 'null' .PHP_EOL;
