Admin Dashboard
<?php
$validUser = $_SESSION['validUser'];

?>
<h1>Hi !!! <?php echo $validUser->email; ?></h1>
<a href="logout.php">LogOut</a>