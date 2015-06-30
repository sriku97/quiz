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
.item
{
	text-align: center;
	display: block;
	height: 500px;
}
.carousel
{
	margin-top: 40px;
}
.carousel-control.left, .carousel-control.right
{
    background-image: none
}
#login,#signup
{
	padding: 8px;
	font-family: verdana;
	margin-top: 25px;
	font-size: 130%;
}
#carouselData
{
	font-size: 300px;
	line-height: 350px;
	color: white;
	font-family: Merriweather Sans;
}
#carouselHeading
{
	color: white;
	font-family: Ubuntu;
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
		<div class="col-lg-4">
		</div>
		<div class="col-lg-2">
			<a id="login" href="login" role="button" class="btn btn-danger btn-lg btn-block">Login</a>
	    </div>
	    <div class="col-lg-2">
			<a id="signup" href="signup" role="button" class="btn btn-success btn-lg btn-block">Sign Up</a>
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
					<p id="carouselData">?</p>
				</div>
				<div class="item">
					<h1 id="carouselHeading">Discover answers</h1>
					<br>
					<p id="carouselData">!</p>
				</div>
				<div class="item">
					<h1 id="carouselHeading">Rise to the top</h1>
					<br>
					<p id="carouselData">&#9818</p>
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