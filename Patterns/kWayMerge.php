<?php 

class ListNode {
    public int $value;
    public ?ListNode $next;
    public function __construct(int $value, ?ListNode $next = null) {
      $this->value = $value;
      $this->next = $next;
    }
}
  
function merge_lists(array $lists) {
    $minHeap = new SplMinHeap();
    // put the root of each list in the min heap
    foreach($lists as $node){
      if ($node !== null) {
        $minHeap->insert($node);
      }
    }
   
    // take the smallest(top) element form the min-heap and add it to the result
    // if the top element has a next element add it to the heap
    $resultHead = null;
    $resultTail = null;
    while ($minHeap->count() > 0) {
      $node = $minHeap->extract();
      if ($resultHead === null) {
        $resultHead = $resultTail = $node;
      } else {
        $resultTail->next = $node;
        $resultTail = $resultTail->next;
      }
      if ($node->next !== null) {
        $minHeap->insert($node->next);
      }
    }
  
    return $resultHead;
  }
  
$l1 = new ListNode(2);
$l1->next = new ListNode(6);
$l1->next->next = new ListNode(8);
  
$l2 = new ListNode(3);
$l2->next = new ListNode(6);
$l2->next->next = new ListNode(7);
  
$l3 = new ListNode(1);
$l3->next = new ListNode(3);
$l3->next->next = new ListNode(4);
  
$result = merge_lists([$l1, $l2, $l3]);
echo 'Here are the elements form the merged list: ';
while ($result !== null) {
    echo $result->value;
    $result = $result->next;
}