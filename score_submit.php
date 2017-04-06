<?php

// load config
require_once "config.php";
require_once "inc.php";

// session start
ob_start();
session_start();

//echo $_SESSION["id"];

// check authentication status
is_authen();

// set page title
$PAGE_TITLE="Submit Score";

// load header
include  __DIR__ . "/header_blank.php";
?>
<!-- start body content -->
<?php
    // check for null value, redirect to main page
    $mem_id=$_POST['mem_id'];
    if ($mem_id==null) {
      // TODO: show some alert here
    } else {
      // check befor insert

      // get value

      $mem_id=$_POST['mem_id'];
      $mem_post_id1=$_POST['mem_pos_id1'];
      $mem_post_id2=$_POST['mem_pos_id2'];
      $mem_post_id3=$_POST['mem_pos_id3'];

      $score1=$_POST['score1'];
      $score2=$_POST['score2'];
      $score3=$_POST['score3'];

      // TODO: chage to fucntion

      // insert new row
      $sql="INSERT INTO `member_position_score` (`judge_id`, `mem_id`, `mem_pos_id`, `score`)
            VALUES (".$_SESSION['id'].", ".$mem_id.", ".$mem_post_id1.", ".$score1."),
                  (".$_SESSION['id'].", ".$mem_id.", ".$mem_post_id2.", ".$score2."),
                  (".$_SESSION['id'].", ".$mem_id.", ".$mem_post_id3.", ".$score3.")";

      if(mysqli_query($link, $sql)){
        $message="Insert position score ".$score1.", ".$score2.",".$score3." successfully.";
      } else{
        $message="ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }
    }


?>
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--4-col"></div>
  <div class="mdl-cell mdl-cell--4-col">
    <!-- begin card view -->
    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">Message</h2>
      </div>
      <div class="mdl-card__supporting-text">
      <?=$message;?>
      </div>
      <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect" href="index.php">
          OK
        </a>
      </div>
    </div>
    <!-- end card view -->
  </div>
  <div class="mdl-cell mdl-cell--4-col"></div>
</div>

<!-- end page content -->
<?php

// load footer
include  __DIR__ . "/footer.php";
