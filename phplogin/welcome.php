<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>


    
    
      <div class="welcome">
	<div class="name"><?php echo "<h1>Ciao "."<font color=coral>". $_SESSION['username'] ."</font>"."</h1>"; ?></div>

      <a href="logout.php"><button class="esci">Esci</button></a>
	</div>

</body>
</html>