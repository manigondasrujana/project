
<?php
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];

?>

<html>
<body>
<form action="display.php" method="get">
<label> first name </label>
<input type="text" name="first_name"/><br>
<label> last name </label>
<input type="text" name="last_name"/><br>
<label>&nbsp;</label>
<input type="submit" value="submit"/>

</form>
</body>
</html>
