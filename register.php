<?php
include_once('./db.php');
?>
<html>
<head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
   <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
	<center>
	<h1>회원가입</h1>
	<form action="./register.php" method="POST">
	<table border="1" bordercolor="white" cellspacing="1" cellpadding="4" width="400">
	<tr>
	  <td>
            <label>이름</label>
	  </td>
	  <td colspan="2">
	    <input type="text" id="name" name="name" value=""  />
	  </td>
	</tr>
	<tr>
	  <td>
	    <label>id</label>
	  </td>
	  <td>
	    <input type="text" id="userid" value="" name="userid" />
	  </td>
	   <td>
	    <input type="submit" id="check" value="id중복확인">
	    <script>
	       $(document).ready(function(){
	         $("#check").click(function(){
 		   if($("#userid").val()==""){
			alert("아이디를 적어주세요");
		   }
		   })
	       });
	    </script>
	  </td>
	</tr>
	<tr>
	  <td>
	    <label>password</label>
	  </td>
	  <td colspan="2">
	    <input type="password" id="password" name="password" value="" />
	  </td>
	</tr>
	<tr>
	  <td>
	    <label>contact</label>
	  </td>
	  <td colspan="2">
	    <input type="text" id="contact" name="contact" value="" />
	  </td>
	</tr>
	<tr>
	  <td>
	    <label>nickname</label>
	  </td>
	  <td colspan="2">
	    <input type="text" id="nickname" name="nickname" value="" />
	  </td>
	</tr>
	</table>
	<input type="submit" id="complete" value="가입신청"  />	
	<input type="reset">
	
	<br />
	</form>
	</center>
        <?php  
	          if(!empty($_POST['userid'])){
	          $sql='select * from `user`';
	          $result=mysql_query($sql);
	          while($row=mysql_fetch_array($result)){
		     if($row['userid']==$_POST['userid']){
	                echo"<script>alert('사용할 수 없는 아이디입니다');</script>";
			exit;
	             }
	          }
		  echo '<script>if($(document).("#userid").val()!=""){alert("사용할 수 있는 아이디입니다");}</script>';  
	       }
	    ?>
		<?php  
	    if(!empty($_POST['userid']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['contact']) && !empty($_POST['nickname'])){
	     $uid=$_POST['userid'];
	     $psw=$_POST['password'];
	     $name=$_POST['name'];
	     $con=$_POST['contact'];
	     $nick=$_POST['nickname'];
	     
	     $sql="insert into `user` (`userid`, `password`, `name`, `contact`, `nickname`) values ('$uid', '$psw', '$name', '$con', '$nick')";
	   $result=mysql_query($sql);
	   if(!$result){
	   $message='오류'.mysql_error()."\n";
	   $message .= '쿼리'.$sql;
	   die($message);
	   }
	   echo ('<script>alert("저희 게시판에 가입하신 것을 환영합니다!");document.location.href="./page1.php";</script>');
	  
	  }else{
	   /* echo('
		<script>
		alert("asdfasdf");
		   $(document).ready(function(){
			$("#complete").click(function{
				if($("#contact").val()==""){
					alert("칸을 모두 채워주세요.");
				}
			})
		   })
		</script>
	   ');*/
	   }

	   
	?>
	
</body>
</html>
