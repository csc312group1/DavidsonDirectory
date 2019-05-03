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

  <!-- Results -->
  
  <?php
require 'vendor/autoload.php'; // include Composer's autoloader

$conn = new MongoDB\Client('mongodb://localhost');

$db = $conn->DavidsonDirectory;

$fs = $db->fs;

$email = $_GET["name"];

$oneFac = $fs->findOne(['campus_email' => $email]);

$LastName = $oneFac['last_name'];
$FirstName = $oneFac['first_name'];
$phone = $oneFac['office_phone_full'];
$title = $oneFac['job_title'];
$department = $oneFac['department'];
$office = $oneFac['office_address'];
$box = $oneFac['campus_box'];

?>
  
  
  <div class="row darkBack">
  <div class="col-1"></div>
  <div class="col-2">
    <br>
    <div class="whiteBack">
      <br><br>
      <img style="width:13em; height:13em;" class="center img-fluid" src="img/wildcat.png" alt="Picture"/>
      <br><br>
    </div>
  </div>
  <div class="col-8">
    <br>
    <h3 class="whiteFont" id="descrpTitle"> <?php echo $FirstName , " ", $LastName ?> </h3>
    <div class="lightBack" style="border-radius: 0.4em;">
      <p class="smallerIndent bigPfont"><br>
        <strong>Title:          </strong>  <?php echo $title ?> <br>
        <strong>Department:     </strong>  <?php echo $department ?> <br>
	<strong>E-Mail Address: </strong>  <?php echo $email ?> <br>
	<strong>Office:		</strong>  <?php echo $office ?> <br>
	<strong>Work Number:    </strong>  <?php echo $phone ?> <br>
	<strong>P.O. Box:	</strong>  <?php echo $box ?> <br>

      </p>
      <a class="smallIndent underline whiteFont" href="index.html" title="home">Next Search</a>
      <br><br>
    </div>
    <br>
  </div>
  <div class="col-1"></div>
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