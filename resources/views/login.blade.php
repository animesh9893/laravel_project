<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
</head>
<body>
	<x-header />
	<form action="login" method="POST">
		@csrf
		Email : <input type="email" name="email"><br><br>
		Password : <input type="password" name="password"><br><br>
		<input type="submit" name="login">
	</form>
</body>
</html>