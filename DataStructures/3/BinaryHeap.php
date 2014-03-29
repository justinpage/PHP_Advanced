<?php

class BinaryHeap
{
	protected $heap;

	public function __construct()
	{
		$this->heap = [];
	}

	public function isEmpty()
	{
		return empty($this->heap);
	}

	public function count()
	{
		return count($this->heap) - 1;
	}

	public function extract()
	{
		if($this->isEmpty()) {
			throw new RunTimeException('Heap is empty');
		}

		$root = array_shift($this->heap);

		if(!$this->isEmpty()) {
			$last = array_pop($this->heap);
			array_unshift($this->heap, $last);

			$this->adjust(0);
		}

		return $root;
	}

	public function compare($item1, $item2)
	{
		if ($item1 === $item2) {
			return 0;
		}

		return ($item1 > $item2 ? 1 : -1);
	}


	protected function isLeaf($node)
	{
		return ((2 * $node) + 1) > $this->count();
	}

	protected function adjust($root)
	{
		if (!$this->isLeaf($root)) {
			$left = (2 * $root) + 1;
			$right = (2 * $root) + 2;

			// if root is less than either of its children
			$h = $this->heap;
			if ((isset($h[$left]) &&
				$this->compare($h[$root], $h[$left]) < 0)
				|| (isset($h[$right]) &&
				$this->compare($h[$root], $h[$right]) < 0)
			) {
					if (isset($h[$left]) && isset($h[$right])) {
						$j = ($this->compare($h[$left], $h[$right]) >= 0) ? $left : $right;
					}
					elseif (isset($h[$left])) {
						$j = $left;
					}
					else {
						$j = $right;
					}

					list($this->heap[$root], $this->heap[$j]) = [$this->heap[$j], $this->heap[$root]];

					$this->adjust($j);
				}
		}
	}

	public function insert($item)
	{
		$this->heap[] = $item;

		$place = $this->count();
		$parent = floor($place / 2);
		// while not at root and greater than parent
		while (
			$place > 0 && $this->compare(
				$this->heap[$place], $this->heap[$parent]) >= 0
	   	) {
			// swap places
			list($this->heap[$place], $this->heap[$parent]) = [$this->heap[$parent], $this->heap[$place]];
			$place = $parent;
			$parent = floor($place/2);
		}
	}
}

$heap = new BinaryHeap();
$heap->insert(19);
$heap->insert(36);
$heap->insert(54);
$heap->insert(100);
$heap->insert(17);
$heap->insert(3);
$heap->insert(25);
$heap->insert(1);
$heap->insert(67);
$heap->insert(2);
$heap->insert(7);

/* var_dump($heap); */

// while (!$heap->isEmpty()) {
// 	echo $heap->extract() . "\n";
// }


class MyHeap extends SplMaxHeap
{
	public function compare($item1, $item2)
	{
		return (int) $item1 - $item2;
	}
}


class PriQueue extends SplPriorityQueue
{
	public function compare($p1, $p2)
	{
		if ($p1 === $p2) return 0;
		return ($p1 < $p2) ? 1 : -1;
	}
}

$pq = new PriQueue();
$pq->insert('A', 4);
$pq->insert('B', 3);
$pq->insert('C', 5);
$pq->insert('D', 8);
$pq->insert('E', 2);
$pq->insert('F', 7);
$pq->insert('G', 1);
$pq->insert('H', 6);
$pq->insert('I', 0);

$pq->setExtractFlags(SplPriorityQueue::EXTR_BOTH);

while ($pq->valid()) {
	print_r($pq->current());
	echo "\n";
	$pq->next();
}
