<?php
ini_set("display_errors", "1");
include_once('./db.php');
session_start();
if(!isset($_SESSION['is_login'])){
  header('Location:./login.php');
}
?>
<html>
<head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
   <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
   <table border="1" bordercolor="white" width="600">
   <form action="./writing.php" method="POST">
   <tr>
	<td rowspan="3" align="right">category: </td>
	<td><input type="checkbox" id="science" name="science">science</td> 
   </tr>
   <tr>
	<td><input type="checkbox" id="social" name="social" >social</td>
   </tr>
   <tr>
	<td><input type="checkbox" id="culture" name="culture">culture</td>
   </tr>
   <tr>
	<td align="right">title: </td>
	<td><textarea name="title" rows="1" cols="100"></textarea>
   </tr>
   <tr>
	<td colspan="2"><textarea name="txtarea" rows="20" cols="150"></textarea> </td>
   </tr>
   <tr>
	<td colspan="2" align="center"><input type="submit" id="write" value="작성" name="finish" /></td>
   </tr>
   </form>
   <script>
	function test(){
		$('write').click(function(){
				alert('check!!');
		})
	}
	
   </script>
  <?php 
     
     if(!empty($_POST['science']) || !empty($_POST['social']) || !empty($_POST['culture'])){
    	     $title=$_POST['title'];
	     $content=$_POST['txtarea'];
	     $userid=$_SESSION['id'];
	     if(!empty($title) && !empty($content)){
	        $sql="insert into `post` (`title`, `content`, `user_id`) values ('$title', '$content', '$userid')";
	        $result=mysql_query($sql);
	     }else{
	        echo "<script>alert('insert title and content!');</script>";
		exit;
	     }
	     $sql="select * from `post` where title='$title' and content='$content' and user_id='$userid'";
	     $result=mysql_query($sql);
	     $row=mysql_fetch_array($result);
	     $postid=$row['id'];
	     if(!empty($_POST['science'])){
	       $sql1 = "insert into `post_category` (`post_id`, `category_id`) values ('$postid', '1')";
	       $result1 = mysql_query($sql1);
	     }
	     if(!empty($_POST['social'])){
	       $sql1 = "insert into `post_category` (`post_id`, `category_id`) values ('$postid', '2')";
	       $result1 = mysql_query($sql1); 
	     }
	     if(!empty($_POST['culture'])){
	       $sql1= "insert into `post_category` (`post_id`, `category_id`) values ('$postid', '3')";
	       $result1 = mysql_query($sql1);
	     }
	     
	     
      }else{
      echo "<script>test();</script>";
      }
    
  
   ?>
   </table>
</body>
</html>