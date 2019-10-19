<?php

require_once('Template.php');
require_once("DB.class.php");

$db = new DB();

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

// Error message if anything is invalid
$errorMsg = "";

//Regular and safe vars.  $tempMajor is used for sanitizing in the foreach loop
$email = "";
$major = "";
$expectedgrade = "";
$favetopping = "";

$safeEmail = "";
$safeMajor = "";
$tempMajor = "";
$safeGrade = "";
$safeTopping = "";

$page = new Template('Thank you'); // Automatically sets title

$page->addHeadElement('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>');
$page->addHeadElement('<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>');
$page->addHeadElement('<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>');

$page->addHeadElement('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');

$page->addHeadElement('<script src="../scripts/scripts.js"></script>');
$page->addHeadElement('<link href="../style/style.css" rel="stylesheet">');

$page->addHeadElement('<link rel="icon" type="image/png" href="../images/me.png">');
$page->finalizeTopSection(); // Closes head section
$page->finalizeBottomSection(); // bottom section used for javascript (probably not needed)


print $page->getTopSection();
print '<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">';
print '<span class="navbar-brand mb-0 h1">Sprint 1 Assignment</span>';
print '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
print '<span class="navbar-toggler-icon"></span>';
print '</button>';
print '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
print '<ul class="navbar-nav mr-auto">';
print '<li class="nav-item">';
print '<a class="nav-link" href="index.php">Home</a>';
print '</li>';
print '<li class="nav-item">';
print '<a class="nav-link" href="survey.php">Survey</a>';
print '</li>';
print '<li class="nav-item">';
print '<a class="nav-link" href="search.php">Find an Album<span class="sr-only">(current)</span></a>';
print '</li>';
print '<li class="nav-item">';
print '<a class="nav-link" href="privacy.php">Privacy Policy<span class="sr-only">(current)</span></a>';
print '</li>';
print '</ul>';

print '</div>';
print '</nav>';

// Email logic.  Checks isset/!empty.  Trims/real_escape_strings/sanitizes/validates.  Creates an error if nothing entered or invalid selection
if (isset($_POST["email"]) && !empty($_POST["email"])){
	$email = trim($_POST['email']);

	$safeEmail = $db->dbEsc($email);
	$safeEmail = filter_var($safeEmail, FILTER_SANITIZE_EMAIL);
	$safeEmail = filter_var($safeEmail, FILTER_VALIDATE_EMAIL);
	if(empty($safeEmail)){
		$errorMsg .= '<li class = "text-center list-group-item border-0">Please enter a valid email Address</li>';
		}
}
else{
	$errorMsg .= '<li class = "text-center list-group-item border-0">Email not entered</li>';
}


/* The major question uses checkboxes.  Getting values from a checkbox gives an array.
The only way I could figure out how to get the array values is with a foreach loop.  
The foreach trims/real_escape_strings/sanitizes each value then appends it to $safeEmail */
if (isset($_POST["major"]) && !empty($_POST["major"])){
	
	$major = $_POST['major'];
		foreach ($major as $name){ 
				$tempMajor = trim($name);
				$tempMajor = $db->dbEsc($tempMajor);
				$safeMajor .= filter_var($tempMajor, FILTER_SANITIZE_STRING) . " ";
		}
		if(empty($safeMajor)){
		$errorMsg .= '<li class = "text-center list-group-item border-0">Please select a valid topping</li>';
		}
}
else{
	$errorMsg .= '<li class = "text-center list-group-item border-0">Major(s) not selected</li>';
}

// Grade logic.  Checks isset/!empty.  Trims/real_escape_strings/sanitizes.  Creates an error if nothing selected or invalid selection
if (isset($_POST["grade"]) && !empty($_POST["grade"])){
	$expectedgrade = trim($_POST["grade"]);
	$safeGrade = $db->dbEsc($expectedgrade);
	$safeGrade = filter_var($safeGrade, FILTER_SANITIZE_STRING);
	if(empty($safeGrade)){
		$errorMsg .= '<li class = "text-center list-group-item border-0">Please select a valid expected grade</li>';
	}
}
else{
	$errorMsg .= '<li class = "text-center list-group-item border-0">Expected grade not selected</li>';
}

// Topping logic.  Checks isset/!empty.  Trims/real_escape_strings/sanitizes.  Creates an error if nothing selected or invalid selection
if (isset($_POST["topping"]) && !empty($_POST["topping"])){
	$favetopping = trim($_POST["topping"]);
	$safeTopping = $db->dbEsc($favetopping);
	$safeTopping = filter_var($safeTopping, FILTER_SANITIZE_STRING);
	if(empty($safeTopping)){
		$errorMsg .= '<li class = "text-center list-group-item border-0">Please select a valid topping</li>';
	}
}
else{
	$errorMsg .= '<li class = "text-center list-group-item border-0">Favorite topping not selected</li>';
}




// Displays a message if $errorMsg is > 0
if (strlen($errorMsg) > 0){
	print '<div class="container wrapper">';
	print '<h1 class="uw">Student Survey</h1><hr>';

	print '<div class="border rounded col-md-10 mx-auto px-4 pb-3">';
	print '<h2 class="mt-3 text-center">The following errors were found</h2>';
	print '<ul class="list-group list-group-flush">';
	print $errorMsg;
	print '</ul>';
	print '<div class="col text-center">';
	print '<button type="submit" class="btn btn-primary mt-3" onclick="goBack()">Back</button>';

	print '</div>';
	print '</div>';


	print '</div">';
}

// Should get to here if everything is validated.                          INSERT STUFF GOES HERE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
else{
print '<div class="container wrapper">';
print '<h1 class="uw">Student Survey</h1><hr>';
print '<li class="text-center">Thank you for participating! <br><a href="survey.php">Take another survey</a></li>';


print '</div">';
// Stuff for josh to figure out,  use the safe variables

//Use these for the query:      $safeEmail     $safeMajor       $safeGrade      $safeTopping     

//$query = 'SELECT * FROM album WHERE (albumtitle LIKE "'.$searchterm.'%'.'" OR albumartist LIKE "'.$searchterm.'%'.'" )';

/* $query = "INSERT INTO survey(email, major, expectedgrade, favetopping)
		VALUES ('".$safeEmail"','".$major"','".$expectedgrade"','".$favetopping"')";

$result = $db->dbCall($query);
 */


}




print $page->getBottomSection(); // closes the html

?>