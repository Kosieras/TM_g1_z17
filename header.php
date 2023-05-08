<?php 
//Spradzanie sesji
declare(strict_types=1);
session_start();
if (!isset($_SESSION['loggedin'])) //Jezeli nie ma sesji
{
  	header('Location: index.php'); //Powrot do panelu logowania
	exit(); 
}
  ?>
<header>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top mt-0 mb-0 ms-0 me-0 pt-0 pb-0 ps-0 pe-0">
	<div class="container-fluid">
	
		<div class="collapse navbar-collapse" id="main_nav">
			<ul class="navbar-nav ">
              <li class="nav-item dropdown ">
					<a class="nav-link dropdown-menu-end" href="#" data-bs-toggle="dropdown"><?php
$connection = mysqli_connect(
    "localhost",
    "kosierap_z17",
    "Laboratorium123",
    "kosierap_z17",
);
if (!$connection) {
    echo " MySQL Connection error." . PHP_EOL;
    echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
    exit();
}
($result = mysqli_query($connection, "Select * from users;")) or
    die("DB error: $dbname");
while ($row = mysqli_fetch_array($result)) {
    if ($_SESSION["user"] == $row[1]) {
        if (
            end(explode(".", $row[3])) == "png" ||
            end(explode(".", $row[3])) == "jpg" ||
            end(explode(".", $row[3])) == "jpeg" ||
            end(explode(".", $row[2])) == "gif"
        ) {
            print "<img src='$row[3]' style='max-width:30px; max-height:30px; '/>";
        } else {
            print "<img src='av.png' style='max-width:30px; max-height:30px; '/>";
        }
    }
}
?></a>
					<ul class="dropdown-menu">
						<li>
                          
                         
   		<a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-1x">WYLOGUJ</i></a>
                 </li>
						
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Gotowce</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="scan/test.php">test.php </a></li>
						<li><a class="dropdown-item" href="scan/index1.php"> index1.php</a></li>
<li><a class="dropdown-item" href="scan/index1_2.php"> index1.php z test.php</a></li>
                      <li><a class="dropdown-item" href="scan/index1_3.php"> index1.php z test.php + AJAX</a></li>
                      <li><a class="dropdown-item" href="scan/index1_4.php"> index1.php z test.php + AJAX + user</a></li>
					</ul>
				</li>
              <li class="nav-item dropdown ">
					<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Aplikacje</a>
					<ul class="dropdown-menu">
                      
						 <li><a class="dropdown-item" href="apka.php"> APLIKACJA</a></li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Dodaj i kasuj</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="dodaj1.php">Dodaj</a></li>
						<li><a class="dropdown-item" href="kasuj1.php">Kasuj</a></li>
                      
					</ul>
				</li>
				 <?php if(  $_SESSION['user'] == "admin@google.com"   ) print "
              <li class='nav-item dropdown '>
					<a class='nav-link dropdown-toggle' href='#' data-bs-toggle='dropdown'>Staff</a>
					<ul class='dropdown-menu'>
                       <li><a class='dropdown-item' href='worker.php'> Zmień worker</a></li>
                      <li><a class='dropdown-item' href='staff.php'> Staff </a>
                     
					</ul>
				</li>";
?>

            
			</ul> 
		</div> 
		
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
	</div> 
</nav>		
		
</div>
</header>