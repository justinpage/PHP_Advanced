<?php

// Global variables used for the databases;
$sdbc = NULL;

// No arguments
// opens database connection
// should return true
function open_session() {
	global $sdbc;
	$sdbc = mysqli_connect('localhost', 'root', 'battosai', 'test');
	return true;
}

// No arguments
// closes the database connection
// returns closed status
function close_session() {
	global $sdbc;
	return mysqli_close($sdbc);
}

// One argument: session_id
// retries session data
// return session data as string
function read_session($sid)
{
	global $sdbc;
	$q = sprintf('SELECT data FROM sessions WHERE id="%s"', mysqli_real_escape_string($sdbc, $sid));
	$r = mysqli_query($sdbc, $q);

	if (mysqli_num_rows($r) === 1) {
		list($data) = mysqli_fetch_array($r, MYSQLI_NUM);
		return $data;
	}
	return '';
}

// Two arguments: session_id and session_data
function write_session($sid, $data) {
	global $sdbc;

	$q = sprintf('REPLACE INTO sessions (id, data), VALUES("%s", "%s")',
		mysqli_real_escape_string($sdbc, $sid), mysqli_real_escape_string($sdbc, $data));
	$r = mysqli_query($sdbc, $q);

	return true;
}

function destroy_session($sid) {
	global $sdbc;

	$q = sprintf('DELETE FROM sessions WHERE id="%s"', mysqli_real_escape_string($sdbc, $sid));
	$r = mysqli_query($sdbc, $q);

	$_SESSION = [];

	return true;
}

// One argument: value in seconds
function clean_session($expire) {
	global $sdbc;

	// delete old sesssions
	$q = sprintf('DELETE FROM sessions WHERE DATE_ADD(last_accessed, INTERVAL %d SECOND) < NOW()',
		(int) $expire);
	$r = mysqli_query($sdbc, $q);

	return true;
}

// decalre session to use:
session_set_save_handler('open_session', 'close_session', 'read_session', 'write_session', 'destroy_session', 'clean_session');

// start the session
session_start();
