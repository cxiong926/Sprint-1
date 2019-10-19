<?php
// Link for mysql queries
//https://www.php.net/manual/en/function.mysql-query.php
// page 274 in book

require_once('Template.php');
require_once("DB.class.php");

$page = new Template('Find an Album'); // Automatically sets title

$page->addHeadElement('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>');
$page->addHeadElement('<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>');
$page->addHeadElement('<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>');

$page->addHeadElement('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');

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
print '<li class="nav-item active">';
print '<a class="nav-link" href="search.php">Find an Album<span class="sr-only">(current)</span></a>';
print '</li>';
print '<li class="nav-item">';
print '<a class="nav-link" href="privacy.php">Privacy Policy<span class="sr-only">(current)</span></a>';
print '</li>';
print '</ul>';				
print '</div>';
print '</nav>';


print '<div class="container wrapper">';
print '<h1 class="uw">Find an Album</h1><hr>';
print '<p class="text-center">Use this form to search for an album.</p>';

print '<form class="border rounded col-md-10 mx-auto px-4" id="albumSearch" method="POST" action="results.php">';

print '<div class="form-group row mt-3 mb-2">';
print '<label class="col-sm-4 col-form-label">What are you looking for?</label>';
print '<div class="col-sm-8">';
print '<input type="text" name="search" id="search" class="form-control" required>';
print '</div>';
print '</div>';


print '<div class="form-group row">';
print '<div class="col text-center">';
print '<button type="submit" name="submit" class="btn btn-primary">Search</button>';
print '</div>';
print '</div>';

print '</form>';

print '</div>';





print $page->getBottomSection(); // closes the html

?>