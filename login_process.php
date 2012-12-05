<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
ini_set("display_errors", "1");
session_start();
include_once('./db.php');
$userid=$_POST['userid'];
$pwd=$_POST['password'];
if(!empty($userid) && !empty($pwd)){
   $sql='select * from `user`';
   $result=mysql_query($sql);
     while($row = mysql_fetch_array($result)){
      if($row['userid']==$_POST['userid'] && $row['password']==$_POST['password']){
       	 $_SESSION['is_login']=true;
	 $_SESSION['nickname']=$row['nickname'];
	 $_SESSION['id']=$row['id'];
	 header('Location: ./main.php');
	 exit;
        }
	
   }
}

echo "로그인 하지 못했습니다.";
?>
<button type="button" onclick="document.location.href='page1.php'">돌아가기</button>
