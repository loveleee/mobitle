<?php
ini_set("display_errors", "i");
include_once('./db.php');
session_start();
if(!isset($_SESSION['is_login'])){
	haeder('Location:./login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
comment<br>
<form action="./comment.php" method="GET">
      <textarea rows="2" cols="60" name="comment"></textarea></br>
      <input name="post_id" value="<? echo $_GET['post_id']; ?>" style="display:none;">
      <input type="submit" value="작성"  />
</form>
<?
if(!empty($_GET['post_id']) || !empty($_GET['comment'])){
      $post_id=$_GET['post_id'];
      $sql="select * from `comment` where post_id = '$post_id'";
      $result=mysql_query($sql);
   while($row=mysql_fetch_array($result)){
      $user_id=$row['user_id'];
      $sql1="select * from `user` where id = '$user_id'";
      $result1=mysql_query($sql1);
      $row1=mysql_fetch_array($result1);
     echo '<hr><br>'.$row1['nickname'].'<br>'.$row['content'].'<br>';
   }
}
if(!empty($_GET['comment'])){
  $content=$_GET['comment'];
  $user_id = $_SESSION['id'];
  $postid=$_GET['post_id'];
  $sql2="insert into `comment` (`content`, `user_id`, `post_id`) values ('$content', '$user_id', '$postid')";
  $result2=mysql_query($sql2);
}
    ?>
  
</body>
</html>