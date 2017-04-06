<?php

// load config
require_once "config.php";
require_once "inc.php";



// session start
ob_start();
session_start();

// if session is set redirect to index
if (isset($_SESSION["id"])) {
  url_redirect("index.php");
  die();
}

// check for authentication
if (isset($_POST["submit"])) {
  // get value
  $login=$_POST["login"];
  $password=$_POST["password"];
  // authentication
  $session_id=authentication($login,$password);
  if ($session_id!=null && $session_id!=0) {
    // store session
    $_SESSION["id"]=$session_id;
    url_redirect("index.php");
    die();
  } else {
    // TODO: authentication fail alter somtings

  }

}

// set page title
$PAGE_TITLE="Sign In";

// load header
include  __DIR__ . "/header_blank.php";

?>

<!-- start body content -->

<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--4-col"></div>
  <div class="mdl-cell mdl-cell--4-col">
    <div class="mdl-card mdl-shadow--2dp">
      <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text"><? echo $PAGE_TITLE; ?></h2>
      </div>
      <div class="mdl-card__supporting-text">
        <form method="post" action="login.php">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <input class="mdl-textfield__input" type="text" id="login" name="login" required>
             <label class="mdl-textfield__label" for="login">Username</label>
          </div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <input class="mdl-textfield__input" type="password" id="password" name="password" required>
             <label class="mdl-textfield__label" for="password">Password</label>
          </div>
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" name="submit" type="submit">
          Sign In
        </button>
        </form>
      </div>
    </div>
</div>
<div class="mdl-cell mdl-cell--4-col"></div>
</div>
<!--
  <div class="mdl-layout">
  	<main class="mdl-layout__content">
  		<div class="mdl-card mdl-shadow--6dp">
  			<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
  				<h2 class="mdl-card__title-text"><? echo $PAGE_TITLE; ?></h2>
  			</div>
  	  	<div class="mdl-card__supporting-text">
  				<form method="post" action="login.php">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
               <input class="mdl-textfield__input" type="text" id="login" name="login">
               <label class="mdl-textfield__label" for="login">Username</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
               <input class="mdl-textfield__input" type="password" id="password" name="password">
               <label class="mdl-textfield__label" for="password">Password</label>
            </div>
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" name="submit" type="submit">
            Sign In
          </button>
          </form>
  			</div>
  		</div>
  	</main>
  </div> -->
<?php

// load footer
include  __DIR__ . "/footer.php";
