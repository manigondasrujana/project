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
	//CALLING METHODS OF THE $PAGE RECEIVE AND SHOW
	$page->receive
	} else {
	$page->show();
	}
abstract class page {
    	protected $html;
        public function __construct()
	    {
            $this->html .= '<html>';
            $this->html .= '<link rel="stylesheet" href="html.css">';
	    $this->html .= '<body>';
	    }
	public function __destruct()
	    {
	    $this->html .= '</body></html>';
	    echo $this->html;
	    }
	public function receive()
	{
	echo "this is function RECEIVE";
	}
	public function show()
	{
	print_r($_POST);
	}
	}
	//INHERITS THE METHODS OF 'PAGE' TO 'UPLOADFORM'
	class uploadform extends page
	{
	//
	public function receive()
	{
	 $form = "<form action='index.php?page=uploadform' method='post' enctype='multipart/form-data'>";
	 $this->html.=$form;
	}
	//
	function show()
	{
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	//
	if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	}
	else {
	//check file type
	if ($imageFileType != 'csv') {
	echo 'You can only upload a CSV file';
	} else {											                   	   //upload file
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        header("Location:index.php?page=htmlTable&file=$target_file");
	}
	}
	}
	}
	}
	
