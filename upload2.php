<?php
 //$csv = $_POST["fileToUpload"];
  $target_dir = "upload_dir/";
  $file = fopen($_FILES["fileToUpload"]["tmp_name"],"r");
  //$csv = array();
  $csv = fgetcsv($file,1000);
  print_r($csv);
   $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
    $name = basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($tmp_name, "$target_dir/$name");
    //print_r(str_getcsv($file));

    fclose($file);


    ?>

