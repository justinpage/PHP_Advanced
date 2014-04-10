<?php
/**
 * The BinaryNode class defines a node object
 *
 * Provides value for current node, left child, and
 * right child.
 */
class BinaryNode
{
	public $value;
	public $left;
	public $right;

	public static $find;

	/**
	 * Constructor will assign current item to its value
	 * @param int $item
	 * @returns void
	 */
	public function __construct($item)
	{
		$this->value = $item;
		$this->left = null;
		$this->right = null;
	}

	/**
	 * Recursively Traverse the current tree to search for a value
	 * @param int $needle
	 * @returns void
	 */
	public function traverse($needle)
	{
		if (null !== $this->left) {
			$this->left->traverse($needle);
		}
		if ($this->value === $needle) {
			static::$find  = true;
		}
		if (null !== $this->right) {
			$this->right->traverse($needle);
		}
	}
}

/**
 * The BinaryTree class defines a node tree
 *
 * Responsible for creating the tree object and
 * inserting children into its branch
 */
class BinaryTree
{
	protected $root;

	/**
	 * Constructor will create a new node tree with no root
	 * @param void
	 * @returns void
	 */
	public function __construct()
	{
		$this->root = null;
	}

	/**
	 * isEmpty will check to see if the root is current empty
	 * @param void
	 * @returns void
	 */
	public function isEmpty()
	{
		return $this->root === null;
	}

	/**
	 * insert will insert an item inside the binary tree
	 * this is done by creating a new instance of the BinaryNode object
	 * that object will then be able to define its value and its children
	 * @param int $item
	 * @returns void
	 */
	public function insert($item)
	{
		$node = new BinaryNode($item);
		// if the current Binary tree is empty, then the root
		// will be the recently created node
		if ($this->isEmpty()) {
			$this->root = $node;
		} else {
			// a parent node exists and thus we need to insert our child element
			$this->insertNode($node, $this->root);
		}
	}

	/**
	 * insertNode will insert the node into our current root or subtree
	 * the key here is that our subtree (or our root) is a reference to the original
	 * this is done with '&' which passes a direct reference of the subtree.
	 * This allows us to recursivley call the subtree and thus traverse through the array
	 * until we find an appropriate subtree where its appropriate child is null.
	 *
	 * Values that are greater than their parent are inserted right of the subtree else if
	 * they are less than their parent, then they are inserted left of the subtree
	 * Equal values are *not* considered
	 *
	 * @param Object $node, Object &$subtree
	 * @returns void
	 */
	protected function insertNode($node, &$subtree)
	{
		// if the child (subtree) doesn't exist, insert it
		if (null === $subtree) {
			$subtree = $node;
		}

		// a subtree exists and thus we need to recursively traverse
		else {
			if ($node->value > $subtree->value) {
				$this->insertNode($node, $subtree->right);
			}
			elseif ($node->value < $subtree->value) {
				$this->insertNode($node, $subtree->left);
			}
		}
	}

	/**
	 * find will init the process of traversing and finding a node value1
	 * in a current Binary Tree
	 * @param int $needle
	 * @returns boolean
	 */
	public function find($needle)
	{
		// assume that we have *not* found the needle
		BinaryNode::$find = false;
		// begin to traverse the root
		$this->root->traverse($needle);

		if ( true === BinaryNode::$find ) {
			echo "\n$needle does exist!";
			return 1;
		}
		echo "\n$needle does not exist!\n";
		return 0;
	}
}

// create a new Binary Tree
$tree = new BinaryTree();

// insert a few values, matching question
$tree->insert(20);
$tree->insert(10);
$tree->insert(30);
$tree->insert(25);
$tree->insert(40);
$tree->insert(8);
$tree->insert(12);

// find custom values
$tree->find(30) . "\n";
$tree->find(79) . "\n";
