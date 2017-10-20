<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$tmp_name = $_FILES["fileToUpload"]["tmp_name"];
$name = basename($_FILES["fileToUpload"]["name"]);
move_uploaded_file($tmp_name, "$target_dir/$name");
$file = fopen($_FILES["fileToUpload"]["tmp_name"],"r");
fclose($file);
?>




