<?php
ini_set("display_errors", "1");
include_once('./db.php');
session_start();
if(!isset($_SESSION['is_login'])){
   header('Location:./login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
   <style type="text/css">
      a:link, a:visited {color:black;}
      a:hover {color:red;}
      a {text-decoration: none;} 
  
   </style>
</head>
<body>
<header>
<h2>게시글</h2>
</header>
<input type="checkbox" name="science">science<br>
<input type="checkbox" name="social">social<br>
<input type="checkbox" name="culture">culture<br>
<hr>

<?php
//	if(!empty(
$sql="select * from `post`";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){ ?>
   <div>
     <a href="./read.php?<? echo 'title='.$row['title'].'&'.'content='.$row['content']; ?>" target="post"><? echo $row['title']; ?></a>  
   </div>	  
<? } 
?>
<iframe src="" name="post" frameborder="0" width="1000" height="320"></iframe>
</body>
</html>