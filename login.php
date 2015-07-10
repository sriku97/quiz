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
	  only accepts alphanumeric characters, and password accepts no spaces. Copying, 
	  cutting and pasting are also prevented in the text boxes. A tooltip is displayed 
	  when the user hovers over the text box.*/

    $("#username").keypress(function(e)
	{
		var code=(e.which)?e.which:e.keyCode;
		if(code<8||(code>9&&code<48)||(code>57&&code<65)||(code>90&&code<97)||code>122)
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

	$('#username,#password').bind('copy paste cut',function(e)
	{ 
        e.preventDefault();
    });

	$("[data-toggle='tooltip']").tooltip({
        placement : 'top'
    });
});

function displayError()
{
	/*If the password entered is wrong this function is called, which displays the error message.*/

	$(document).ready(function()
	{   
	    $("#wrongpassword").show();
	    $(".mainform").css("height","380px");
	});
}

function removeError()
{
	/*In the case that no wrong input has occured, this function is called and the div that contains
	the error message is hiddem.*/

	$(document).ready(function()
	{   
	    $("#wrongpassword").hide();
	    $(".mainform").css("height","350px");
	});
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
	height: 350px;
	margin-top: 50px;
	border-radius: 10px;
	background-color: rgba(0,0,0,0.6);
	border-width: 1px;
	animation-name: fade;
	animation-duration: 0.25s;
	-webkit-animation-name: fade;
	-webkit-animation-duration: 0.25s;
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
label
{
	font-size: 150%;
	font-family: Ubuntu;
	color: gray;
}
#wrongpassword
{
	text-align: center;
	color: red;
}
.submitdiv
{
	text-align: center;
}
#linkToSignUp
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
    
    /*In the page that processes the login form, if the wrong password has been entered, the session
    variable 'wrongpassword' is set to true, and the user is redirected back to this page. Based on 
    the value of the variable, the error message is displayed*/

    session_start();

    if(isset($_SESSION['wrongpassword']))
    {
    	if($_SESSION['wrongpassword']==true)
    	    echo "<script>displayError();</script>";
    }
    else
    {
        echo "<script>removeError();</script>";    	
    }

    /*If the user is already logged in, then the user is redirected to the main profile page. This
    is done with the help of session variables 'loggedin' and 'username' which store the state of
    logged-inness, and the username of the logged in user.*/

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
			
			<h2 id="formheading">Log In</h2>
			
			<form class="form-horizontal" name="login" action="processLogIn" method="POST" enctype="multipart/formdata">
				
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

				<p id="wrongpassword">Wrong Password! Try again</p>
				
				<div class="submitdiv form-group">
					<button type="submit" class="btn btn-danger">Log In</button>
				</div>
				
				<p id="linkToSignUp">New user? <a href="signup"> Sign Up</a></p>

				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			
			</form>
		
		</div>
		
		<div class="col-lg-4">
		</div>
	
	</div>


</div>
</body>

</html>