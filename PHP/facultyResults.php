<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<!-- Custom Style Sheet -->
	<link type="text/css" rel="stylesheet" href="css/styles.css">
	<!-- Bootstrap Style Sheet -->
	<link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous">
	<title>Davidson College Directory</title>
	<style>
  </style>
</head>

<body>
<!--Content Goes Here -->
<div>
	<!-- Page Header -->
	<header>
		<div class="row darkBack">
			<div class="col-1"></div>
			<div class="col-2">
					<br>
					<center>
			    <a href="index.html" title="home">
			        <img class="img-fluid" src="https://www.davidson.edu/assets/prebuilt/img/logo.png" alt="Davidson College logo" />
			    </a>
					</center>
					<p></p>
			</div>
			<div class="col-9">
				<br>
				<h1 class="whiteFont">Davidson College Directory</h1>
				<p></p>
			</div>
		</div>
		<hr style="margin-bottom:3px; margin-top:3px; height:2px; border:none; background-color:#FFFFFF;"/>
	</header>

  <div class="row darkBack whiteFont">
    <div class="col-1"></div>
    <div class="col-2">
      <br>
      <img style="width:13em; height:13em;" class="center img-fluid" src="img/logo.png" alt="Davidson College Logo"/>
      <br>
      <form action="https://webapps.davidson.edu/directories/secure/">
        <button id="loginButton" type="submit">Login</button>
      </form>
    </div>
    <div class="col-8">
      <br>
      <h3 id="descrpTitle">Results</h3>
      <table class="table">
        <thead>
          <tr class="whiteFont">
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">E-Mail</th>
          </tr>
        </thead>
	<tbody>
<?php
require 'vendor/autoload.php'; // include Composer's autoloader

$conn = new MongoDB\Client('mongodb://localhost');

$db = $conn->DavidsonDirectory;

$fs = $db->fs;

$LastName = $_GET["LastName"];
$FirstName = $_GET["FirstName"];

if($LastName == "" and $FirstName == ""){
echo "Error";
}
else if($LastName == ""){
$faculty = $fs->find(['first_name' => $FirstName]);
foreach ($faculty as $row) {
echo "<tr class='whiteFont'>
    <td><a href='oneFaculty.php?name=$row[campus_email]'> $row[first_name] </a></td> 
    <td><a href='oneFaculty.php?name=$row[campus_email]'> $row[last_name] </a></td> 
    <td>$row[campus_email]</td>
  </tr>";
}
}
else if($FirstName == ""){
$faculty = $fs->find(['last_name' => $LastName]);
foreach ($faculty as $row) {
echo "<tr class='whiteFont'>
   <td><a href='oneFaculty.php?name=$row[campus_email]'> $row[first_name] </a></td> 
    <td><a href='oneFaculty.php?name=$row[campus_email]'> $row[last_name] </a></td> 
    <td>$row[campus_email]</td>
  </tr>";
}
}
else{
$faculty = $fs->find(['first_name' => $FirstName], ['last_name' => $LastName]);
foreach ($faculty as $row) {
echo "<tr class='whiteFont'>
    <td><a href='oneFaculty.php?name=$row[campus_email]'> $row[first_name] </a></td> 
    <td><a href='oneFaculty.php?name=$row[campus_email]'> $row[last_name] </a></td> 
    <td>$row[campus_email]</td>
  </tr>";
}
}

?>
        </tbody>
      </table>
      <a class="smallIndent underline whiteFont" href="index.html" title="home">Return to home</a>
      <br>
    </div>
    <div class="col-1"></div>
  </div>

</div>

<!-- Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	crossorigin="anonymous"></script>
</body>
