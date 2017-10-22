
<?php
	//DISPLAY ERRORS
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	
	//CLASS INSTANTIATION
	$obt = new main();
class Manage {
	//ATTEMPTS TO LOAD THE CLASS AUTOLOAD
	public static function autoload($class) {
	//ENABLING CLASSES TO LOAD AUTOMATICALLY
	include $class . '.php';
	}
	
	}
	spl_autoload_register(array('Manage', 'autoload'));

class main
{
	function __construct{
	//DEFAULT PAGE
	$requestPage = 'uploadForm';
	//DETERMINING IF THE VARIABLE PAGE IS SET AND IS NOT NULLL
	if(isset($_REQUEST['page']))
	        {
	        $requestPage = $_REQUEST['page'];
		}
	//CREATE A NEW INSTANCE OF 'UPLOADFORM' INTO $PAGE
	$page = new $requestPage;

	if($_SERVER['REQUEST_METHOD'] == 'GET') {
	//CALLING METHODS OF THE $PAGE RECEIVE AND SHOW
	$page->receive();
	} else {
	$page->show();
	}
	}
	}
abstract class page {
    	protected $html;
        function __construct()
	    {
            $this->html .= '<html><head>';
            $this->html .= '<link rel="stylesheet" href="styles.css">';
	    $this->html .= '</head><body>';
	    }
	function __destruct()
	    {
	    $this->html .= '</body></html>';
	    stringFunctions::echoString($this->html);
	    }
	
	}
	//INHERITS THE METHODS OF 'PAGE' TO 'UPLOADFORM'
class uploadForm extends page
	{
	//
	function receive()
	{
	$form = '<form action="index2.php?page=uploadForm" method='post' enctype='multipart/form-data'>';
	$form .= '<h1>Select CSV file to upload</h1>';
	$form .= '<br>';
	$form .= '<br>';
	$form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
	
	$form .= '<input type="submit" value="Upload File" name="submit">';
	$form .= '</form>';
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
        header('Location:index2.php?page=htmlTable&file=' $target_file);
	}
	}
	}
	}
	}
class htmlTable extends page
{
        function receive()
        {i
	$fileName = $_REQUEST['file'];
	$handle = fopen($fileName, "r");
	echo '<table>';
	//display header row if true
	if (true) {
	$csvcontents = fgetcsv($handle);
	echo '<tr>';
	foreach ($csvcontents as $headercolumn) {
	echo "<th>$headercolumn</th>";
	}
	echo '</tr>';

}
															    // displaying contents
															   while ($csvcontents = fgetcsv($handle))
{														   

echo '<tr>';
foreach ($csvcontents as $column) 
{
echo "<td>$column</td>";
}
echo'</tr>';
}
echo '</table>';
}
}

class stringFunctions
{

static function echoString($string)
{
echo $string;

}
}
?>
