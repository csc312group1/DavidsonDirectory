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
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">


<body class = "container">

<div class = "container" >

<h1 class="col-md text-center title" id = "title"> Davidson Directory </h1>
<hr>

<button onclick="location.href='facultyStaff.php';">Facutlty/Staff</button>
<button onclick="location.href='student.php';">Student</button>


<div id="TData">

<h2 class="col-md text-center title" id="tournamentTitle"> Details </h2>

<table style="width:100%" id = "One_Tournament">
  <tr>
    <th class = "text-center">Last Name</th>
    <th class = "text-center">First Name</th>
    <th class = "text-center">Job Title</th>
    <th class = "text-center">Department</th>
    <th class = "text-center">Office</th>
    <th class = "text-center">Email</th>
    <th class = "text-center">Phone</th>
    <th class = "text-center">P.O. Box</th>
  </tr>
  
<?php
require 'vendor/autoload.php'; // include Composer's autoloader

$conn = new MongoDB\Client('mongodb://localhost');

$db = $conn->DavidsonDirectory;

$fs = $db->fs;

$arg = $_GET["name"];
$oneFac = $fs->findOne(['campus_email' => $arg]);

 echo "<tr>
    <td>$oneFac[last_name]</td>   
    <td>$oneFac[first_name]</td>
    <td>$oneFac[job_title]</td>
    <td>$oneFac[department]</td>
    <td>$oneFac[office_address]</td>
    <td>$oneFac[campus_email]</td>    
    <td>$oneFac[office_phone_full]</td>   
    <td>$oneFac[campus_box]</td>   
  </tr>";

?>

</table>
</div>


</div>

</body>


</html>
