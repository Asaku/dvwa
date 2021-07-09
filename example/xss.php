<?php
$color = $_GET['color'] ?? "pink"
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TP XSS</title>
</head>
<body style="background-color: 
<?php echo htmlentities($color) ?? "pink"; ?>
">
	<div>age: <?php echo $_GET['age'] ?? 1; ?></div>
	<a href="<?php echo $_GET['link'] ?? "#"; ?>">Le lien</a>
	<br>
	<br>
	<br>
	<br>

	color, age, link en GET
</body>
</html>


#color: 



