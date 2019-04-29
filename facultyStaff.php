<html>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Testing your connection </title>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="tennisData.css">
    <!-- JavaScript -->
    <script src="tennisData.js"></script>
    <script src="sorttable.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">


<body class = "container">

<div class = "container" >

<h1 class="col-md text-center title" id = "title"> Davidson Directory </h1>
<hr>

<button onclick="location.href='facultyStaff.php';">Facutlty/Staff</button>
<button onclick="location.href='student.php';">Student</button>

<div id="TData">

<h2 class="col-md text-center title" id="tournamentTitle"> Faculty/Staff Data</h2>

<table style="width:100%" class = "sortable" id = "Tournament">
  <tr>
    <th class = "text-center">Last Name</th>
    <th class = "text-center">First Name</th>
    <th class = "text-center">Email</th>
  </tr>
  
<?php
require 'vendor/autoload.php'; // include Composer's autoloader

$conn = new MongoDB\Client('mongodb://localhost');

$db = $conn->DavidsonDirectory;

$fs = $db->fs;

$cursor = $fs->find();
	 	
$tuple_count = 0;
foreach ($cursor as $row) {
  
  $tuple_count++;
  echo "<tr>
    <td><a href='oneFac.php?name=$row[campus_email]'> $row[last_name] </a></td> 
    <td><a href='oneFac.php?name=$row[campus_email]'> $row[first_name] </a></td> 
    <td>$row[campus_email]</td>
    
  </tr>";
}


?>
</table>

</div>
</div>

</body>

</html>
