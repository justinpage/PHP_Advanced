<?php

class ReadingList extends SplQueue
{
	// protected $stack;
	// protected $limit;
	//
	// public function __construct($limit = 10)
	// {
	// 	// init
	// 	$this->stack = [];
	// 	$this->limit = $limit;
	// }
	//
	// public function push($item)
	// {
	// 	if (count($this->stack) < $this->limit) {
	// 		array_unshift($this->stack, $item);
	// 	} else {
	// 		throw new RunTimeException('Stack is full');
	// 	}
	// }
	//
	// public function pop()
	// {
	// 	if ($this->isEmpty()) {
	// 		throw new RunTimeException('Stack is empty!');
	// 	} else {
	// 		return array_shift($this->stack);
	// 	}
	// }
	//
	// public function top()
	// {
	// 	return current($this->stack);
	// }
	//
	// public function isEmpty()
	// {
	// 	return empty($this->stack);
	// }
}

$myBooks = new ReadingList();
$myBooks->enqueue('A Dream of Spring');
$myBooks->enqueue('The Winds of Winter');
$myBooks->enqueue('A Dance with Dragons');
$myBooks->enqueue('A Feast for Crows');
$myBooks->enqueue('A Storm of Swords');
$myBooks[] = 'A Clash of Kings';
$myBooks[] = 'A Game of Thrones';

echo $myBooks->bottom() . "n";

// $myBooks->setIteratorMode(
// 	    SplDoublyLinkedList::IT_MODE_FIFO|SplDoublyLinkedList::IT_MODE_KEEP
// 	);
foreach ($myBooks as $book) {
	echo $book . "\n";
}
// $myBooks->pop(); // outputs 'A Game of Thrones'
// $myBooks->pop(); // outputs 'A Clash of Kings'
// $myBooks->pop(); // outputs 'A Storm of Swords'
//
// echo $myBooks->top();
