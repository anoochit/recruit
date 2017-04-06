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
$PAGE_TITLE="Score";

// load header
include  __DIR__ . "/header.php";
?>
<!-- start body content -->
<?php
    // check for null value, redirect to main page
    if ($_POST["mem_id"]==null) {
      url_redirect("index.php");
      die();
    }

    // get member by id
    $result_member=get_member_by_id($_POST["mem_id"]);
    $row_member = mysqli_fetch_array($result_member);

    // get 3 job position by id
    // TODO : MUST change query T_T
    $result_pos1=get_job_by_id($_POST["pos_id1"]);
    $row = mysqli_fetch_array($result_pos1);
    $pos1_name=$row['name'];
    $result_pos2=get_job_by_id($_POST["pos_id2"]);
    $row = mysqli_fetch_array($result_pos2);
    $pos2_name=$row['name'];
    $result_pos3=get_job_by_id($_POST["pos_id3"]);
    $row = mysqli_fetch_array($result_pos3);
    $pos3_name=$row['name'];

?>
<form action="score_submit.php" method="post">
<input type="hidden" name="mem_id" value="<?=$_POST["mem_id"];?>">
<input type="hidden" name="mem_pos_id1" value="<?=$_POST["mem_pos_id1"];?>">
<input type="hidden" name="mem_pos_id2" value="<?=$_POST["mem_pos_id2"];?>">
<input type="hidden" name="mem_pos_id3" value="<?=$_POST["mem_pos_id3"];?>">

<div class="mdl-grid" >
  <div class="mdl-cell mdl-cell--2-col">
    <img class="img-circle" src="img/0.png">
  </div>
  <div class="mdl-cell mdl-cell--6-col">
    <h3><?=$row_member['name'];?></h3>
  </div>
</div>
</div>

<div class="mdl-grid" >
  <!-- start column -->
  <div class="mdl-cell mdl-cell--4-col">
    <div class="demo-card-wide mdl-card ">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">#1 : <?=$pos1_name;?></h2>
      </div>
      <div class="mdl-card__supporting-text">
        <!-- inoutbox -->
        <div class="mdl-textfield mdl-js-textfield">
          <input class="mdl-textfield__input" type="number" id="score1" min="0" max="100" name="score1" required>
          <label class="mdl-textfield__label" for="score1">Score</label>
        </div>
      </div>
    </div>
  </div>
  <!-- end column -->

  <!-- start column -->
  <div class="mdl-cell mdl-cell--4-col">
    <div class="demo-card-wide mdl-card ">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">#2 : <?=$pos2_name;?></h2>
      </div>
      <div class="mdl-card__supporting-text">
        <!-- inoutbox -->
        <div class="mdl-textfield mdl-js-textfield">
          <input class="mdl-textfield__input" type="number" id="score2" min="0" max="100" name="score2" required>
          <label class="mdl-textfield__label" for="score2">Score</label>
        </div>
      </div>
    </div>
  </div>
  <!-- end column -->

  <!-- start column -->
  <div class="mdl-cell mdl-cell--4-col">
    <div class="demo-card-wide mdl-card ">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">#3 : <?=$pos3_name;?></h2>
      </div>
      <div class="mdl-card__supporting-text">
        <!-- inoutbox -->
        <div class="mdl-textfield mdl-js-textfield">
          <input class="mdl-textfield__input" type="number" id="score3" min="0" max="100" name="score3" required>
          <label class="mdl-textfield__label" for="score3">Score</label>
        </div>
      </div>
    </div>
  </div>
  <!-- end column -->
</div>
<!-- submit button -->
<div class="mdl-grid action-button">
    <a class="mdl-button  mdl-button--raised mdl-js-button mdl-js-ripple-effect" href="index.php">
      BACK
    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <!-- Accent-colored raised button with ripple -->
  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored " >
    Save
  </button>
</div>
</form>
<!-- end page content -->
<?php

// load footer
include  __DIR__ . "/footer.php";
