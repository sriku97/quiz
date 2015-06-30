<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Ubuntu|Merriweather Sans">

<title>Spider Web Development task 3</title>

<style>
html
{
	height: 100%;
}
body
{
	background: linear-gradient(black, blue);
	background: -moz-linear-gradient(black, blue);
	background: -o-linear-gradient(black, blue);
	background: -webkit-linear-gradient(black, blue);
}
.logo
{
	font-family: Ubuntu;
	color: gray;
	font-size: 280%;
}
.mainform
{
	height: 450px;
	margin-top: 30px;
	border-radius: 10px;
	background-color: rgba(0,0,0,0.6);
	border-width: 1px;
}
label
{
	font-size: 150%;
	font-family: Ubuntu;
	color: gray;
}
.form-group
{
	margin-top: 45px;
}
#formheading
{
	text-align: center;
	font-family: Ubuntu;
	color: gray;
}
#redirect
{
	font-size: 120%;
	text-align: center;
	color: red;
	font-family: Ubuntu;
}
.submitdiv
{
	text-align: center;
}
</style>

</head>

<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-1">
		</div>
		<div class="col-lg-3">
			<h1 class="logo">The Spider Quiz</h1>
		</div>
		<div class="col-lg-8">
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
		</div>
		<div class="col-lg-4 mainform">
			<h2 id="formheading">Sign Up</h2>
			<form class="form-horizontal">
				<div class="form-group">
					<label for="name" class="control-label col-sm-3">Name </label>
					<div class="col-sm-9">
						<input type="text" name="name" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="username" class="control-label col-sm-3">Username </label>
					<div class="col-sm-9">
						<input type="text" name="username" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="control-label col-sm-3">Password </label>
					<div class="col-sm-9">
						<input type="password" name="password" class="form-control">
					</div>
				</div>
				<div class="submitdiv form-group">
					<button type="submit" class="btn btn-success">Register</button>
				</div>
				<p id="redirect">Already a user? <a href="login">Login</a></p>
			</form>
		</div>
		<div class="col-lg-4">
		</div>
	</div>
</div>
</body>

</html>