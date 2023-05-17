<?php 
class TreeNode {
    public int $value;
    public ?TreeNode $left;
    public ?TreeNode $right;
    public function __construct(int $value) {
      $this->value = $value;
      $this->left = null;
      $this->right = null;
    }
}
  
  
function traverse(TreeNode $root) {
  $result = [];
  if ($root === null) {
    return $result;
  }

 $queue = new SplQueue();
  $queue->enqueue($root);
  while ($queue->count() > 0) {
    $levelSize = $queue->count();
    $currentLevel = [];
    for ($i = 0; $i < $levelSize; $i++) {
      $currentNode = $queue->dequeue();
      // add the node to the current level
      $currentLevel[] = $currentNode->value;
      // insert the children of current node in the queue
      if ($currentNode->left !== null) {
        $queue->enqueue($currentNode->left);
      }
      if ($currentNode->right !== null) {
        $queue->enqueue($currentNode->right);
      }
    }
    $result[] = $currentLevel;
  }

  return $result;
};
  
function reverse(TreeNode $root) {
    $result = [];
    if ($root === null) {
      return $result;
    }
  
   $queue = new SplQueue();
    $queue->enqueue($root);
    while ($queue->count() > 0) {
      $levelSize = $queue->count();
      $currentLevel = [];
      for ($i = 0; $i < $levelSize; $i++) {
        $currentNode = $queue->dequeue();
        // add the node to the current level
        $currentLevel[] = $currentNode->value;
        // insert the children of current node in the queue
        if ($currentNode->left !== null) {
          $queue->enqueue($currentNode->left);
        }
        if ($currentNode->right !== null) {
          $queue->enqueue($currentNode->right);
        }
      }
      array_unshift($result, $currentLevel);
    }
  
    return $result;
};
  
  
  $root = new TreeNode(12);
  $root->left = new TreeNode(7);
  $root->right = new TreeNode(1);
  $root->left->left = new TreeNode(9);
  $root->right->left = new TreeNode(10);
  $root->right->right = new TreeNode(5);
  echo 'Level order traversal: ' . json_encode(traverse($root)) . PHP_EOL;
  echo 'Level order traversal: ' . json_encode(reverse($root)) . PHP_EOL;


  function findMinimumDepth(TreeNode $root)
  {
    if ($root === null) {
        return 0;
    }
    
    $queue = new SplQueue();
    $queue->enqueue($root);
    $minimumDepth = 0;
    while($queue->count() > 0 ){
        $minimumDepth += 1;
        $levelSize = $queue->count();
        for ($i = 0; $i < $levelSize; $i++) {
            $currentNode = $queue->dequeue();
            if($currentNode->left == null && $currentNode->right == null) return $minimumDepth;
            // insert the children of current node in the queue
            if ($currentNode->left !== null) {
              $queue->enqueue($currentNode->left);
            }
            if ($currentNode->right !== null) {
              $queue->enqueue($currentNode->right);
            }
        }
    }
}

$root = new TreeNode(12);
$root->left = new TreeNode(7);
$root->right = new TreeNode(1);
$root->right->left = new TreeNode(10);
$root->right->right = new TreeNode(5);
echo 'Tree Minimum Depth: '. findMinimumDepth($root). PHP_EOL;
$root->left->left = new TreeNode(9);
$root->right->left->left = new TreeNode(11);
echo 'Tree Minimum Depth: '. findMinimumDepth($root). PHP_EOL;


function findSuccessor(TreeNode $root, $key)
{
  if ($root === null) {
      return null;
  }
  $queue = new SplQueue();
  $queue->enqueue($root);
  while($queue->count() > 0 ){
    $currentNode = $queue->dequeue();
    // insert the children of current node in the queue
    if ($currentNode->left !== null) {
      $queue->enqueue($currentNode->left);
    }
    if ($currentNode->right !== null) {
      $queue->enqueue($currentNode->right);
    }
    if($currentNode->value === $key) break;
  }
  if($queue->count() > 0){
      return $queue->bottom()->value;
  }
  return null;
}
echo sprintf('The successor of %d is %d: ', 12, findSuccessor($root, 12)). PHP_EOL;