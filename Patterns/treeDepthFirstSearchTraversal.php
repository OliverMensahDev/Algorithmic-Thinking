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
  

function hasPath(?TreeNode $root, int $sum) 
{
  if ($root === null) {
    return false;
  }

  // if the current node is a leaf and its value is equal to the sum, we've found a path
  if ($root->value === $sum && $root->left === null && $root->right === null) {
    return true;
  }

  // recursively call to traverse the left and right sub-tree
  // return true if any of the two recursive call return true
  return hasPath($root->left, $sum - $root->value) || hasPath($root->right, $sum - $root->value);
}

  
function traverse(TreeNode $root){
  $result = [];
  if ($root === null) {
    return $result;
  }

 $queue = new SplStack();
 $queue->push($root);
 
  while(!$queue->isEmpty()){
    $currentNode = $queue->pop();
    $result[] = $currentNode->value;
    
    if($currentNode->right != null){
      $queue->push($currentNode->right);
    }
    if($currentNode->left != null){
      $queue->push($currentNode->left);
    }
    
   $queue->rewind();
  }
 return $result;
}

$root = new TreeNode(12);
$root->left = new TreeNode(7);
$root->right = new TreeNode(1);
$root->left->left = new TreeNode(9);
$root->right->left = new TreeNode(10);
$root->right->right = new TreeNode(5);
echo 'Tree has path: ' . (Boolean) hasPath($root, 23). PHP_EOL;
echo 'Tree has path: ' . (Boolean) hasPath($root, 16).  PHP_EOL;
echo 'Path Traversal: ' . json_encode(traverse($root)).  PHP_EOL;