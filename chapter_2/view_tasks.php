<?php
$dbc = mysqli_connect('localhost', 'root', 'battosai', 'PHP_Advanced');

// Get the latest dates as timestamps
$q = 'SELECT UNIX_TIMESTAMP (MAX(date_added)), UNIX_TIMESTAMP (MAX(date_completed)) FROM tasks';
$r = mysqli_query($dbc, $q);

list($max_a, $max_c) = mysqli_fetch_array($r, MYSQLI_NUM);

// determine the greater timestamp:
$max = ($max_a > $max_c) ? $max_a : $max_c;

$interval = 60 * 60 * 6; // 6 hours

// send the headers:
header("Last-Modified: " . gmdate ('r', $max));
header("Expires: " . gmdate ("r", ($max + $interval)));
header("Cache-Control: max-age=$interval");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Current To-Do List</title>
</head>
<body>
	<h2>Current To-Do List</h2>
	<?php
		function make_list($parent, $all = null) {
			static $tasks;

			if (isset($all)) {
				$tasks = $all;
			}

			echo "<ol>";

			foreach ($parent as $task_id => $todo) {
				echo <<<EOT
					<li><input type="checkbox" name="tasks[$task_id]" value="done">$todo			
EOT;

				if (isset($tasks[$task_id])) {
					make_list($tasks[$task_id]);
				}

				echo "</li>";
			} // end for each

			echo "</ol>";
		}

		if(($_SERVER['REQUEST_METHOD'] == 'POST')
			&& isset($_POST['tasks'])
			&& is_array($_POST['tasks'])
			&& !empty($_POST['tasks'])) {

				$q  = 'UPDATE tasks set date_completed=NOW() WHERE task_id IN (';

				foreach ($_POST['tasks'] as $task_id => $v) {
					$q .= $task_id . ', ';
				}

				$q = substr($q, 0, -2) . ')';
				$r = mysqli_query($dbc, $q);

				// report on the result:
				if (mysqli_affected_rows($dbc) === count($_POST['tasks'])) {
					echo "<p>The task(s) have been marked as completed</p>";
				} else {
					echo "<p>Not all tasks could be marked as completed!</p>";
				}
			}

		$q  = 'SELECT task_id, parent_id, task FROM tasks WHERE date_completed="0000-00-00 00:00:00" ORDER BY date_added ASC';

		$r = mysqli_query($dbc, $q);
		
		// Also store the tasks in an array for use later:

		$tasks = [];

		while (list($task_id, $parent_id, $task) = mysqli_fetch_array($r, MYSQLI_NUM)) {
			$tasks[$parent_id][$task_id] = $task;
		}

		// make a form:
		echo <<<EOT
<p>Chek the box next to a task and click "update" to mark a task as completed(it, and any subtasks, will no longer appear in the list).</p>
<form action="view_tasks.php" method="post">
EOT;

		make_list($tasks[0], $tasks);

		echo <<<EOT
<input name="submit" type="submit" value="Update" />
</form>
EOT;

		// echo "<pre>" . print_r($tasks,1) . "</pre>";
	?>
</body>
</html>
