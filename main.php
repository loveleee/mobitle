<?php
session_start();
if(!isset($_SESSION['is_login'])){
   header('Location:./login.php');
}
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
  <style type="text/css">
  body {
     font-size: 1.0em;
     font-family: dotum;
     line-height: 1.6em;
  }
  h1 {
     font-size:1.4em;
  }    
  header {
     border-bottom: 1px solid #ccc;
     padding:10px 0;
  }
  a:link {color:black;}
  a:visited {color:black;}
  a:hover {color:red;}
  a:active {color:red;}
  a {text-decoration:none;}
 
  nav {
    float: left;
    margin-right: 20px;
    min-height: 500px;
    border-right: 1px solid #ccc;
  }
  nav ul {
      list-style:none;
      padding-left:0;
      padding-right:20px;
  }
  </style>
</head>
<body>
<header>
<h1>게시판</h1>
<?php echo $_SESSION['nickname'];?>님 환영합니다<br />
<a href="./logout.php"><input type="button" value="로그아웃"></a>
</header>
<div>
<nav>
<ul>
  <li><a href="./writing.php" target="write">글쓰기</a></li>
  <li><a href="./titles.php" target="write">게시글</a></li>
</ul>
</nav>
</div> 

<iframe src="./titles.php" name="write" style="float:left" width="80%", height="70%" frameborder="0""></iframe>


</body>
</html>
