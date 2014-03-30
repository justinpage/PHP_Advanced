<?php

$graph = [
	'A' => ['B', 'F'],
	'B' => ['A', 'D', 'E'],
	'C' => ['F'],
	'D' => ['B', 'E'],
	'E' => ['B', 'D', 'F'],
	'F' => ['A', 'E', 'C'],
];

class Graph
{
	protected $graph;
	protected $visited = [];

	public function __construct($graph)
	{
		$this->graph = $graph;
	}

	public function breadthFirstSearch($origin, $destination)
	{
		// mark all nodes as unvisited
		foreach ($this->graph as $vertex => $adj) {
			$this->visited[$vertex] = false;
		}

		// enqueue the origin vertex and mark as visited
		$q = new SplQueue();
		$q->enqueue($origin);
		$this->visited[$origin] = true;

		// this is used to track the path back from each node
		$path = [];
		$path[$origin] = new SplDoublyLinkedList();
		$path[$origin]->setIteratorMode(
			SplDoublyLinkedList::IT_MODE_FIFO|SplDoublyLinkedList::IT_MODE_KEEP
		);

		$path[$origin]->push($origin);

		$found = false;
		// while queue is not empty and destination not found
		while (!$q->isEmpty() && $q->bottom() != $destination) {
			$t = $q->dequeue();

			if (!empty($this->graph[$t])) {
				// for each adjacent neighbor
				foreach ($this->graph[$t] as $vertex) {
					if (!$this->visited[$vertex]) {
						// if not visited, enqueue vertex and mark
						// as visited
						$q->enqueue($vertex);
						$this->visited[$vertex] = true;
						// add vertext to current path
						$path[$vertex] = clone $path[$t];
						$path[$vertex]->push($vertex);
					}
				}
			}
		}

		if (isset($path[$destination])) {
			echo "$origin to $destination ",
				count($path[$destination]) - 1,
			" hops\n";
			$sep = ' ';
			foreach ($path[$destination] as $vertex) {
				echo $sep, $vertex;
				$sep = '->';
			}
			echo "\n";
		} else {
			echo "No route from $origin to $destination\n";
		}
	}
}

// $g = new Graph($graph);
//
// $g->breadthFirstSearch('D', 'C');


$graph = [
	'A' => ['B' => 3, 'D' => 3, 'F' =>6],
	'B' => ['A' => 3, 'D' => 1, 'E' => 3],
	'C' => ['E' => 2, 'F' => 3],
	'D' => ['A' => 3, 'B' => 1, 'E' => 1, 'F' => 2],
	'E' => ['B' => 3, 'C' => 2, 'D' => 1, 'F' => 5],
	'F' => ['A' => 6, 'C' => 3, 'D' => 2, 'F' => 5],
];

/* var_dump($graph); */

class Dijkstra
{
	protected $graph;

	public function __construct($graph)
	{
		$this->graph = $graph;
	}

	public function shortestPath($source, $target)
	{
		// array of best estimates of shortest path to each
		// vertex
		$d = [];
		// array of predecessors for each vertex
		$pi = [];
		// queue of all unoptimized vertices
		$Q = new SplPriorityQueue();

		foreach ($this->graph as $v => $adj) {
			$d[$v] = INF;
			$pi[$v] = null;
			foreach ($adj as $w => $cost) {
				$Q->insert($w, $cost);
			}
		}


		$d[$source] = 0;

		while (!$Q->isEmpty()) {
			$u = $Q->extract();
			if (!empty($this->graph[$u])) {
				// relax each adjacent vertex
				foreach ($this->graph[$u] as $v => $cost) {
					// alternate route length to adjacent neighbor
					$alt = $d[$u] + $cost;
					// if alternate route is shorter
					if ($alt < $d[$v]) {
						$d[$v] = $alt;
						$pi[$v] = $u;
					}
				}
			}
		}

		// we can now find the shortest path using reverse
		// iteration
		$S = new SplStack();
		$u = $target;
		$dist = 0;

		while (isset($pi[$u]) && $pi[$u]) {
			$S->push($u);
			$dist += $this->graph[$u][$pi[$u]]; // add distance to predecessor
			$u = $pi[$u];
		}
		

		if ($S->isEmpty()) {
			echo "No route from $source to $target\n";
		} else {
			// add the source node and print the path in reverse
			// (LIFO) order
			$S->push($source);
			echo "$dist:";
			$sep = ' ';
			foreach ($S as $v) {
				echo $sep, $v;
				$sep = '->';
			}
			echo "\n";
		}
	}
}


$g = new Dijkstra($graph);
$g->shortestPath('D', 'C');
$g->shortestPath('C', 'A');
