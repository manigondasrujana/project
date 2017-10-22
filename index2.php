<html>
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
	<h1>This is PROJECT1</h1>
	<input type="file" name="fileToUpload" id="fileToUpload">
	<input type="submit" value="Upload File" name="submit"">
	<p>CHOOSE CSV FILE TO UPLOAD</p>
</body>
</html>
<?php
	//DISPLAY ERRORS
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	
	//CLASS INSTANTIATION
	class Autoload{
	//ATTEMPTS TO LOAD THE CLASS AUTOLOAD
	public static function autoload($class) {
	//ENABLING CLASSES TO LOAD AUTOMATICALLY
	spl_autoload_register(array('Autoload', 'autoload') {
	include $class_name . '.php';
	});
	$obj  = new main();
	include $class . '.php';
	}
	
	}
?>

