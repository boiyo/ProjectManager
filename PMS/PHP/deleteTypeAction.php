<?php require_once "db.php"; ?>
<?php
  header("Content-type:text/html; charset=utf-8");
  
  $program_id = $_GET["program_id"];
  
  $delete_item_result = mysql_query("DELETE FROM task_item WHERE program_id=$program_id AND EXISTS(SELECT * FROM task_type WHERE program_id=$program_id)");  
  $delete_program_result = mysql_query("DELETE FROM task_type WHERE program_id=$program_id") or die(mysql_error());
	  
  mysql_free_result($delete_item_result);
  mysql_free_result($delete_program_result);  
  mysql_close($conn);
  
  //回到前一頁
  header("Location: ".$_SERVER['HTTP_REFERER']);
?>