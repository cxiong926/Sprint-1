<?php

require_once('Template.php');

$page = new Template('Privacy Policy'); // Automatically sets title

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
print '<li class="nav-item">';
print '<a class="nav-link" href="search.php">Find an Album<span class="sr-only">(current)</span></a>';
print '</li>';
print '<li class="nav-item active">';
print '<a class="nav-link" href="privacy.php">Privacy Policy<span class="sr-only">(current)</span></a>';
print '</li>';
print '</ul>';				
print '</div>';
print '</nav>';
		
print '<div class="container">';
		
print '<h1 class="uw">Privacy Policy</h1><hr>';
print '<p>The University of Wisconsin System Administration (UWSA) recognizes the importance of protecting the privacy of information provided to us.</p>';

print '<h2>Personal Information</h2>';
print '<p>We will use personal information that you provide via e-mail or through other online means only for purposes necessary to serve your needs, such as responding to an inquiry or other request for information. This may involve redirecting your inquiry or comment to another person or department better suited to meeting your needs.';
print '</p>';
print '<p>Some webpages at UWSA may collect personal information about visitors and use that information for purposes other than those stated above. Each webpage that collects information will have a separate privacy statement that will tell you how that information is used.</p>';
print '</p>';

print '<h2>Collected Information</h2>';
print '<p>UWSA monitors network traffic for the purposes of site management and security. We use this information to help diagnose problems and carry out other administrative tasks. We also use statistic information to determine which information is of most interest to users, to identify system problem areas, or to help determine technical requirements. The server log information does not include personal information.';
print '</p>';

print '<h2>External Websites</h2>';
print '<p>This site contains links to other sites outside of UWSA. UWSA is not responsible for the privacy practices or the content of such websites.';
print '</p>';


print '<h2>Questions</h2>';
print '<p>If you have any questions about this privacy statement, the practices of this site, or your use of this website, please contact ';
print '<a href="mailto:webteam@uwsa.edu">Webmaster.</a>';
print '</p>';

print '</div>';







print $page->getBottomSection(); // closes the html

?>