<?php 
// Input: lists = [[1,4,5],[1,3,4],[2,6]]
//Output: [1,1,2,3,4,4,5,6]
//Explanation: The linked-lists are:
//[
//    1->4->5,
//    1->3->4,
//    2->6
// ]
//merging them into one sorted list:
//1->1->2->3->4->4->5->6
class ListNode{
    public int $value;
    public ?ListNode $next;

    public function __construct(int $value, ?ListNode $next = null){
        $this->value = $value;
        $this->next = $next;
    }
}

function mergeKLists($lists) {
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

$l1 = new ListNode(1, new ListNode(4, new ListNode(5)));
$l2 = new ListNode(1, new ListNode(3, new ListNode(4)));
$l3 = new ListNode(2, new ListNode(6));

$head = mergeKLists([$l1, $l2, $l3]);

$list = '';
while($head != null){
    $list .= $head->value .' -> ';
    $head = $head->next;
}

echo $list . 'null'. PHP_EOL;