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

	class main{
	function __construct{
	//DEFAULT PAGE
	$requestPage = 'uploadform';
	//DETERMINING IF THE VARIABLE PAGE IS SET AND IS NOT NULLL
	if(isset($_REQUEST['page']))
	        {
	        $requestPage = $_REQUEST['page'];
		}
	//CREATE A NEW INSTANCE OF 'UPLOADFORM' INTO $PAGE
	$page = new uploadform();

	if($_SERVER['REQUEST_METHOD'] == 'GET') {
	//CALLING METHODS OF THE $PAGE ACCEPT $ DISPLAY
	$page->accept();
	} else {
	$page->display();
	}

	}


	
?>

