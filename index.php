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
$PAGE_TITLE="Home";

// load header
include  __DIR__ . "/header.php";

// list member with position data
$result=get_member_and_position();

?>
<!-- start body content -->
<div class="mdl-grid">
<div class="mdl-cell mdl-cell--12-col">
<table class="mdl-data-table mdl-js-data-table ">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">#ID</th>
      <th class="mdl-data-table__cell--non-numeric">Name</th>
      <th class="mdl-data-table__cell--non-numeric">Postion 1</th>
      <th class="mdl-data-table__cell--non-numeric">Postion 2</th>
      <th class="mdl-data-table__cell--non-numeric">Postion 3</th>
      <th class="mdl-data-table__cell--non-numeric"></th>
    </tr>
  </thead>
  <tbody>
    <?php
        if ($result!=null) {
            while($row = mysqli_fetch_array($result)){
              $mem_id=$row['member_id'];
              $mem_name=$row['name'];

              // check row exist in score table
              if (is_score_exist_by_id($mem_id,$_SESSION['id'])==false) {

     ?>
        <form action="score.php" method="post">
        <input type="hidden" name="mem_id" value="<?=$mem_id;?>">
        <tr>
          <td ><?=$mem_id;?></td>
          <td class="mdl-data-table__cell--non-numeric"><?php echo $mem_name;?></td>
          <?php
                // list member position
                $result_mem_pos=get_member_position($row['member_id']);
                if ($result_mem_pos!=null) {
                  $i=1;
                  while ($row=mysqli_fetch_array($result_mem_pos)) {
                      $pos_id=$row['pos_id'];
                      $mem_pos_id=$row['id'];
                    ?>
                      <input type="hidden" name="mem_pos_id<?=$i;?>" value="<?=$mem_pos_id;?>">
                      <input type="hidden" name="pos_id<?=$i;?>" value="<?=$pos_id;?>">
                      <td class="mdl-data-table__cell--non-numeric"><?=$pos_id; ?></td>
                    <?
                    $i++;
                  }
                }
           ?>
          <td>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit">
                Score
            </button>
          </td>
        </tr>
      </form>
    <?php
                }// if score exist
          } //while
        }
     ?>
  </tbody>
</table>
</div>
</div>
<!-- end page content -->

<?php

// load footer
include  __DIR__ . "/footer.php";
