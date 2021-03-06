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

<script>

$(document).ready(function()
{
	/*For validation of input, certain restrictions are imposed on form inputs. Username
	  only accepts alphanumeric characters, name accepts only letters and spaces, and password
	  accepts no spaces. Copying, cutting and pasting are also prevented in the text boxes.
	  A tooltip is displayed when the user hovers over the text box.*/

	$("#username").keypress(function(e)
	{
		var code=(e.which)?e.which:e.keyCode;
		if(code<8||(code>9&&code<48)||(code>57&&code<65)||(code>90&&code<97)||code>122)
		{
			e.preventDefault();
		}
	});

	$("#name").keypress(function(e)
	{
		var code=(e.which)?e.which:e.keyCode;
		if(code<8||(code>9&&code<31)||(code>33&&code<65)||(code>90&&code<97)||code>122)
		{
			e.preventDefault();
		}
	});

	$("#password").keypress(function(e)
	{
		var code=(e.which)?e.which:e.keyCode;
		if(code==32)
		{
			e.preventDefault();
		}
	});

	$('#username,#password,#name').bind('copy paste cut',function(e)
	{ 
        e.preventDefault();
    });

	$("[data-toggle='tooltip']").tooltip({
        placement : 'top'
    });
    
});

function verifyUsername()
{
    	/*This is a function that is called to make sure that the username entered by the user is 
    	not taken. This function is called right before the form is submitted. Only if the function
    	returns true, the form will get submitted. Else, an error message is displayed. The validation
    	takes place through an AJAX request sent to a route with the username as a parameter. Based
    	on the response, the function returns either true or false.*/

    	var status;
    	var uname=$("#username").val();

    	$.ajax({
    		async: false,
    		type:"GET",
    		success: function(result)
    		{
    			if(result=="true")
    				status=true;
    			if(result=="false")
    				status=false;
    		},
    		url: "verifyUsername/"+uname
    	});

    	if(status==true)
    	    return true;
    	else
    	{
    		window.alert("Username is already taken!");
    		return false;
    	}
}

</script>

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
	animation-name: fade;
	animation-duration: 0.25s;
	-webkit-animation-name: fade;
	-webkit-animation-duration: 0.25s;
}
label
{
	font-size: 150%;
	font-family: Ubuntu;
	color: gray;
}
#formheading
{
	text-align: center;
	font-family: Ubuntu;
	color: gray;
}
.form-group
{
	margin-top: 45px;
}
.submitdiv
{
	text-align: center;
}
#linkToLogIn
{
	font-size: 120%;
	text-align: center;
	color: red;
	font-family: Ubuntu;
}
@keyframes fade
{
	0%
	{
		opacity: 0.5;
	}
}
@-webkit-keyframes fade
{
	0%
	{
		opacity: 0.5;
	}
}

</style>

</head>

<body>


<?php
    
    /*If the user is already logged in, then the user is redirected to the main profile page. This
    is done with the help of session variables 'loggedin' and 'username' which store the state of
    logged-inness, and the username of the logged in user.*/

    session_start();
    
    if(isset($_SESSION['loggedin'])&&isset($_SESSION['username']))
    {
    	header('Location: profile');
    	exit;
    }

?>



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
			
			<form class="form-horizontal" name="signup" action="processSignUp" method="POST" enctype="multipart/formdata" onsubmit="return verifyUsername()">
				
				<div class="form-group">
					<label for="name" class="control-label col-sm-3">Name </label>
					<div class="col-sm-9">
						<input type="text" id="name" name="name" class="form-control" autocomplete="off" required data-toggle="tooltip" data-original-title="Only letters and spaces are allowed!">
					</div>
				</div>
				
				<div class="form-group">
					<label for="username" class="control-label col-sm-3">Username </label>
					<div class="col-sm-9">
						<input type="text" id="username" name="username" class="form-control" autocomplete="off" required data-toggle="tooltip" data-original-title="Only alphanumeric characters are allowed!">
					</div>
				</div>
				
				<div class="form-group">
					<label for="password" class="control-label col-sm-3">Password </label>
					<div class="col-sm-9">
						<input type="password" id="password" name="password" class="form-control" required data-toggle="tooltip" data-original-title="No spaces allowed!">
					</div>
				</div>
				
				<div class="submitdiv form-group">
					<button type="submit" class="btn btn-success">Register</button>
				</div>
				
				<p id="linkToLogIn">Already a user? <a href="login"> Login</a></p>
				
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			
			</form>
		
		</div>
		
		<div class="col-lg-4">
		</div>
	
	</div>


</div>
</body>

</html>