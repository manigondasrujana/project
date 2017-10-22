<?php
//DISLAY ERRORS
ini_set('display_errors', 'On');
error_reporting(E_ALL);

	//CLASS INSTANTIATION
class Manage {
	//ATTEMPTS TO LOAD THE CLASS Manage
	public static function autoload($class) {
        include $class . '.php';
        }
}
	//ENABLING CLASSES TO LOAD AUTOMATICALLY
	spl_autoload_register(array('Manage', 'autoload'));
	//OBJECT INSTANTIATION
	$obj = new main();
class main {
	public function __construct()
    	{	
        //DEFAULT PAGE
	$pageRequest = 'uploadform';
        //DETERMINING IF THE VARIABLE page IS SET AND IS NOT NULL
        if(isset($_REQUEST['page'])) {
 	$pageRequest = $_REQUEST['page'];
	}
        // CREATING A NEW INSTANCE OF uploadform INTO page
	$page = new $pageRequest;
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
	//CALLING METHODS OF THE $page get and post
	$page->get();
    	}   
    	else {
   	$page->post();
        }
        } 
}
abstract class page {
	protected $html;
	public function __construct()
	{
        $this->html .= '<html>';
	$this->html .= '<link rel="stylesheet" href="styles.css">';
	$this->html .= '<body>';
	
	}
	public function __destruct()
    	{
        $this->html .= '</body></html>';
	echo $this->html;
	}
	public function get() {
        echo 'default get message';
	}
	public function post() {
	print_r($_POST);
	}
}
	//INHERITS THE PROPERTIES FROM page  TO uploadform
class uploadform extends page
{
    public function get()
        {   
  	$this->html.=staticfunction::createform(); 
	}
	public function post() {
      	//PATH OF THE FILE DECLARATION
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);     
  	
	// CHECKING THE FILE TYPE WHETHER IT IS CSV FILE OR NOT
	if ($imageFileType != 'csv') {
	echo 'You can only upload a CSV file';
	} else {
	//UPLOADING THE FILE
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	//REDIRECTING TO THE NEXT PAGE BY USING HEADER
	header::redirect($target_file);
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
        }  
	}   
}
class header {
       public static function redirect($target_file) {
       //FORWARDING TO THE NEXT PAGE USING HEADER
       header('Location: index.php?page=htmlTable&csvFile=' . $target_file); 
       }
}
class staticfunction {
	//CONTENT AND DESIGN OF FIRST WEB PAGE
        public static function createform() {
	$form = '<h1>Upload Form</h1>';
	$form.= '<form action="index.php?page=uploadform" method="post" enctype="multipart/form-data">';
        $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
        $form .= '<br> <hr> <input type="submit" value="Upload Image" name="submit"> </br> </hr>';
	$form .= '</form> ';
	return $form;
	}
}
class htmlTable extends page {
public function get() {
$filePath = $_GET['csvFile'];
        //OPENS THE URL SPECIFIED IN $filepath
        $f = fopen("$filePath", "r"); 
	//TABLE STYLE
        $x ='<table border = "1" bordercolor = "red"><tr>';
	//Here fgetcsv parse CSV file as an array
        while (($line = fgetcsv($f)) !== false) { 
        for ($i=0; $i < sizeof($line) ; $i++) {             
        $row = $line[$i];
        $cells = explode(";",$row); 
        foreach ($cells as $cell) {
	$x.= "<td> $cell </td>";
	}
	}
	$x.= "</tr>";
	}
	 echo "Here is your CSV file in Table format";
   	$x.= '</table>';
        //closes the open file
        fclose($f); 
        $this->html.= $x;
	}
	}
	?>


