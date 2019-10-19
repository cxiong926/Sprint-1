<?php

require_once('Template.php');
require_once("DB.class.php");

$db = new DB();

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

$page = new Template('Lab 3'); // Automatically sets title

$page->addHeadElement('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>');
$page->addHeadElement('<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>');
$page->addHeadElement('<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>');

$page->addHeadElement('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');

$page->finalizeTopSection(); // Closes head section
$page->finalizeBottomSection(); // bottom section used for javascript (probably not needed)

var_dump($_POST['search']);



$searchterm=trim($_POST['search']);

$query = 'SELECT * FROM album WHERE (albumtitle LIKE "'.$searchterm.'%'.'" OR albumartist LIKE "'.$searchterm.'%'.'" )';
$result = $db->dbCall($query);

print $page->getTopSection();
print '<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">';
print '<span class="navbar-brand mb-0 h1">Sprint 1 Assignment</span>';
print '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
print '<span class="navbar-toggler-icon"></span>';
print '</button>';
print '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
print '<ul class="navbar-nav mr-auto">';
print '<li class="nav-item active">';
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

if (empty($_POST["search"]) || !$result){
	// Error Event

	print '<div class="container wrapper">';
	print '<h1>Search Results</h1>';

	print '<table class="table">';
	print '<thead>';
	print '<tr>';
	print '<th scope="col">ID</th>';
	print '<th scope="col">Album Artist</th>';
	print '<th scope="col">Album Title</th>';
	print '<th scope="col">Length</th>';
	print '</tr>';
	print '</thead>';
	print '<tbody>';
	print '</tbody>';
	print '</table>';
	
	print '<h3 class="text-center">No Results Found</h3>';
	print '<a class="nav-link text-center" href="search.php">Start New Search</a>';

	
}
else {

	print '<div class="container wrapper">';
	print '<h1>Search Results</h1>';

	print '<table class="table">';
	print '<thead>';
	print '<tr>';
	print '<th scope="col">ID</th>';
	print '<th scope="col">Album Artist</th>';
	print '<th scope="col">Album Title</th>';
	print '<th scope="col">Length</th>';
	print '</tr>';
	print '</thead>';
	print '<tbody>';

		foreach ($result as $returnedvalue){
			print '<tr>';
			print '<td>' . $returnedvalue['id'] . '</td>';
			//print '<td>' . $returnedvalue['inserttime'] . '</td>';
			print '<td>' . $returnedvalue['albumartist'] . '</td>';
			print '<td>' . $returnedvalue['albumtitle'] . '</td>';
			print '<td>' . $returnedvalue['albumlength'] . '</td>';
			//print '<td>' . $returnedvalue['status'] . '</td>';
			print '</tr>';  
		}
		
	print '</tbody>';
	print '</table>';

	$result = false;
}



print '</div>';

print $page->getBottomSection(); 

?>