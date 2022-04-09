<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create an Account</title>
</head>
<body>
	<x-header />
	<form action="signup" method="POST">
		@csrf
		Name : <input type="name" name="name"> <br> <br>
		Email : <input type="email" name="email"> <br> <br>
		Mobile :  <input type="text" name="mobile" title="Error Message" pattern="[1-9]{1}[0-9]{9}"> <br> <br>
		Password : <input type="password" name="password"> <br> <br>
		<input type="submit" name="submit">
	</form>
</body>
</html>