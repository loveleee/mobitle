<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
<center>
<h1>Login page</h1>
<form action="login_process.php" method="POST">
  <p><label>id</label><input name="userid" type="text"></p>
  <p><label>password</label><input name="password" type="password"></p>
  <input type="submit" value="로그인" />
  <input type="button" value="회원가입"  onclick="document.location.href='./register.php';">
</form>
</center>
</body>
</html>
