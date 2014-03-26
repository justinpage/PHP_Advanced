<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Add a Task</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

try {
	$pdo = new PDO('mysql:dbname=PHP_Advanced;host=localhost', 'root', 'klvtz');

	if (($_SERVER['REQUEST_METHOD'] == 'POST') && !empty($_POST['task'])) {
		if (isset($_POST['parent_id']) &&
			filter_var($_POST['parent_id'], FILTER_VALIDATE_INT, ['min_range' => 1])) {
				$parent_id = $_POST['parent_id'];
			} else {
				$parent_id = 0;
			}

		$q = 'INSERT INTO tasks(parent_id, task) VALUES (:parent_id, :task)';
		$stmt = $pdo->prepare($q);

		if ($stmt->execute([':parent_id' => $parent_id, ':task' => $_POST['task']])) {
			echo "<p>The task has been added!</p>";	
		} else {
			echo "<p>The task could not be added!</p>";
		}
	}	

	echo '<form action="add_task.php" method="post">
		<fieldset>
		<legend>Add a Task</legend>
		<p>Task: <input name="task" type="text" size="60" maxlength="100"></p>
		<p>Parent Task: <select name="parent_id"><option value="0">None</option>';


	$q = 'SELECT task_id, task FROM tasks where date_completed="0000-00-00 00:00:00" ORDER BY date_added ASC';
	$r = $pdo->query($q);

	$r->setFetchMode(PDO::FETCH_NUM);
	while ($row = $r->fetch()) {
		echo "<option value\"$row[0]\">$row[1]</option>\n";		
	}

	// Complete the form:
	echo '</select></p>
		<input name="submit" type="submit" value="Add This Task">
		</fieldset>
		</form>';

	// Unset the object:
	unset($pdo);


} catch (PDOException $e) {
	echo "<p class='error'>An error occured: " . $e->getMessage() . "</p>";
}

?>
</body>
</html>
