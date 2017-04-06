<?php

include "config.php";

//$pdo = new PDO("mysql:host=".$mysql_host.";charset=utf8;dbname=".$mysql_db, $mysql_user, $mysql_password);

$link = new mysqli($mysql_host,$mysql_user, $mysql_password, $mysql_db);
if ($link->connect_errno) {
    echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
} else {
    // set name for utf8 content
    mysqli_query($link,"SET NAMES UTF8");
}


// check authentication session
function is_authen(){
  if (!isset($_SESSION["id"])) {
    url_redirect("login.php");
  } else {
    return true;
  }
}

// redirect url
function url_redirect($url) {
  header('Location: '.$url);
}

// authentication
function authentication($login,$password) {
  global $link;
  $sql="SELECT * FROM judge WHERE login='".$login."' AND password='".md5($password)."' LIMIT 1";
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        // sesstion create
        $session_id=$row['id'];
      }
      return $session_id;
    } else {
      // return null
      return null;
    }
  } else {
    // return null
    return null;
  }
}

function db_query_result($sql){
  global $link;
  //echo "<pre>".$sql."</pre>";
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      // return result
      return $result;
    } else {
      // return null
      return null;
    }
  } else {
    // return null
    return null;
  }
}

// list member with position
function get_member_and_position(){
  //$sql="SELECT * FROM member ";

  // select only people has position
  $sql="SELECT * FROM member,member_position
        WHERE member_position.member_id=member.id
        GROUP BY member_position.member_id";
  return db_query_result($sql);
}

// get job by id
function get_job_by_id($job_id){
  global $link;
  $sql="SELECT * FROM position where position.id=".$job_id." LIMIT 1";
  return db_query_result($sql);
}

// get member by id
function get_member_by_id($mem_id){
  global $link;
  $sql="SELECT * FROM member where member.id=".$mem_id." LIMIT 1";
  return db_query_result($sql);
}

// get member by id
function is_score_exist_by_id($mem_id,$judge_id){
  global $link;
  $sql="SELECT * FROM member_position_score
            WHERE member_position_score.judge_id=".$judge_id."
                  AND member_position_score.mem_id=".$mem_id." LIMIT 1";
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }

}

// list member
function get_member_position($mem_id){
  global $link;
  $sql="SELECT * FROM member_position where member_position.member_id=".$mem_id;
  return db_query_result($sql);
}

// position
function get_position($pos_id) {
  global $link;
  $sql="SELECT * FROM position WHERE position.id=".$pos_id." LIMIT 1";
  return db_query_result($sql);
}
