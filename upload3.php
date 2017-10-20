<?php
	if (($csvfile = fopen("news_decline.csv", "r")) !==FALSE){
	while (($csvdata = fgetcsv($csvfile, 1000, ",")) !==FALSE){
	$error=' ';
	$colcount = count($csvdata);
	echo '<tr>';
	if($colcount!=5){
	$error = 'incorect';
	} else {
	if(!is_numeric($csvdata[0])) &error.='error';	
	$date = date_parse($csvdata[3]);
	if(!($date["error_count"] == 0 && checkdate($date["month"], $date["day"], $date["year"])))
	$error.='error';
	if(!is_numeric($csvdata[4])) $error.='error';
	switch($error){
		case "incorect":
		echo '<td></td>';
		echo '<td></td>';
		echo '<td class="error">'.$error.'</td>';
		echo '<td></td>';	
		echo '<td></td>';
		break;
		case "error":
		echo '<td class="error">'.$csvdata[0].'</td>';
		echo '<td class="error">'.$csvdata[1].'</td>';
		echo '<td class="error">'.$csvdata[2].'</td>';	
 		echo '<td class="error">'.$csvdata[3].'</td>';
		echo '<td class="error">'.$csvdata[4].'</td>';										break;
	}
	default:
	echo '<td>' .$csvdata[0]. '</td>';
	echo '<td>' .$csvdata[1]. '</td>';
	echo '<td>' .$csvdata[2]. '</td>';
	echo '<td>' .$csvdata[3]. '</td>';	
	echo '<td>' .$csvdata[4]. '</td>';
			
}
						
echo '</tr>';
}
fclose($csvfile);
}
?>
