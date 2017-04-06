<?php

// load config
require_once "config.php";
require_once "inc.php";

// session start
ob_start();
session_start();

// if session is set redirect to index
unset($_SESSION["id"]);
session_destroy();
url_redirect("login.php");
die();


// set page title
$PAGE_TITLE="Sign Out";

// load header
include  __DIR__ . "/header_blank.php";

?>

<?php

// load footer
include  __DIR__ . "/footer.php";
