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
#login,#signup
{
	padding: 8px;
	font-family: verdana;
	margin-top: 25px;
	font-size: 130%;
}
.carousel
{
	margin-top: 40px;
}
.item
{
	text-align: center;
	display: block;
	height: 500px;
}
#carouselHeading
{
	color: white;
	font-family: Ubuntu;
}
#carouselData
{
	font-size: 300px;
	line-height: 350px;
	color: white;
	font-family: Merriweather Sans;
}
.carousel-control.left, .carousel-control.right
{
    background-image: none
}
.leaderboardlink
{
	text-decoration: none !important;
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
		
		<div class="col-lg-4">
		</div>
		
		<div class="col-lg-2">
			<a id="login" href="login" role="button" class="btn btn-danger btn-lg btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</a>
	    </div>
	    
	    <div class="col-lg-2">
			<a id="signup" href="signup" role="button" class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-wrench"></span> Sign Up</a>
	    </div>
	
	</div>


	<div class="row">
		
		<div id="mainCarousel" class="carousel slide" data-interval="5000" data-ride="carousel">
			
			<ol class="carousel-indicators">
				<li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#mainCarousel" data-slide-to="1"></li>
				<li data-target="#mainCarousel" data-slide-to="2"></li>
				<li data-target="#mainCarousel" data-slide-to="3"></li>
			</ol>

			<div class="carousel-inner" role="listbox">
				
				<div class="item active">
					<h1 id="carouselHeading">Ask a question</h1>
					<br>
					<p id="carouselData">?</span></p>
				</div>
				
				<div class="item">
					<h1 id="carouselHeading">Discover answers</h1>
					<br>
					<p id="carouselData"><span class="glyphicon glyphicon-ok"></span></p>
				</div>
				
				<div class="item">
					<h1 id="carouselHeading">Rise to the top</h1>
					<br>
					<a class="leaderboardlink" href="leaderboard" target="_BLANK"><p id="carouselData"><span class="glyphicon glyphicon-stats"></span></p></a>
				</div>
				
				<div class="item">
					<h1 id="carouselHeading">Get addicted</h1>
					<br>
					<p id="carouselData">&#8734</p>
				</div>
			
			</div>

			<a class="carousel-control left" href="#mainCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            
            <a class="carousel-control right" href="#mainCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            </a>

		</div>
	
	</div>


</div>
</body>

</html>