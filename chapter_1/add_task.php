<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Add a Task</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

	$dbc = mysqli_connect('localhost', 'root', 'battosai', 'PHP_Advanced');
	if (($_SERVER['REQUEST_METHOD'] == 'POST') && !empty($_POST['task'])) 
	{
		if (isset($_POST['parent_id']) && filter_var($_POST['parent_id'], FILTER_VALIDATE_INT, ['min_range' => 1]) ) {
			$parent_id = $_POST['parent_id'];
		} else {
			$parent_id = 0;
		}


		// add the task to the database
		$q = sprintf("INSERT INTO tasks (parent_id, task) VALUES (%d, '%s')", $parent_id, mysqli_real_escape_string($dbc, strip_tags($_POST['task'])));

		$r = mysqli_query($dbc, $q);

		// report on the results:
		if (mysqli_affected_rows($dbc) === 1) { 
			echo "<p>The task has been added!</p>";
		} else {
			echo "<p>The task could not be added!</p>";
		}
	}

	// Display the form:
	echo "<form action='add_task.php' method='post'>
		<fieldset>
			<legend>Add a Task</legend>
			<p>Task: <input name='task' type='text' size='60' maxlength='100' required></p>
			<p>Parent Task: <select name='parent_id'><option value='0'>None</option>";
	$q  = 'SELECT task_id, parent_id, task FROM tasks WHERE date_completed="0000-00-00 00:00:00" ORDER BY date_added ASC';

	$r = mysqli_query($dbc, $q);
	
	// Also store the tasks in an array for use later:

	$tasks = [];

	// fetch the records:
	while (list($task_id, $parent_id, $task) = mysqli_fetch_array($r, MYSQLI_NUM)) {
		echo "<option value=\"$task_id\">$task</option>\n";

		// add to array
		$tasks[] = ['task_id' => $task_id, 'parent_id' => $parent_id, 'task' => $task];
	}


	// complete the form:
	echo '</select></p>
		<input name="submit" type="submit" value="Add This Task">
		</fieldset>
		</form>';

	// sort the task by parent id
	function parent_sort($x, $y) {
		return ($x['parent_id'] > $y['parent_id']);
	}

	usort($tasks, 'parent_sort');

	echo '<h3>Current To-Do List</h2><ul>';
		foreach ($tasks as $task) {
			echo "<li>{$task['task']}</li>\n";
		}

	echo "</ul>";
?>
</body>
</html>
