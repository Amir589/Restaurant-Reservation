<?php
	function consoleLog($error) {
		echo ("<script>console.log('" . $error . "');</script>");
		#Comment out this echo if you don't want to log every dang thing
	}

	function getDB() {
		session_start();
		$server = "localhost";
		$username = "reservation";
		$password = "12345@BCDE";
		$db = "reservation";

		$conn = new mysqli($server, $username, $password, $db);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			consoleLog("Failed to connect to database");
			echo ("Error connecting to database. If you get this error again, please contact website administrators.<b>");
			return False;
		} else {
			consoleLog("Created database connection");
			return $conn;
		}
	}

	function exists($var) {
		if ($var != False) {
			consoleLog($var . " exists, returning True.");
			return True;
		} else {
			return False;
		}
	}

	function cleanInput($string) {
		consoleLog("Cleaning input");
		return preg_replace('/[^A-Za-z0-9\s\-]/', '', $string);
	}
?>