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
    animation-name: fade;
	animation-duration: 0.5s;
	-webkit-animation-name: fade;
	-webkit-animation-duration: 0.5s;
}
.logo
{
	font-family: Ubuntu;
	color: gray;
	font-size: 280%;
}
.leaderboard
{
	height: 500px;
	margin-top: 50px;
	background-color: rgba(0,0,0,0.6);
	overflow: auto;
	border: 2px solid white;
}
th,td
{
	text-align: center;
	font-family: Ubuntu;
	font-size: 230%;
}
th
{
	color: red;
}
td
{
	color: white;
}
.table tr:first-child td
{
	color: green;
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
    
    //obtains scores of all users in descending order of scores
    $scores=DB::table('scores')->orderBy('score','desc')->get();

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
		
		<div class="col-lg-2">
		</div>
		
		<div class="col-lg-8 leaderboard">
			
			<table class="table">
			    
			    <thead>
			        
			        <tr>
                        <th>Username</th>
                        <th>Score</th>
                    </tr>
                
                </thead>
            
                <tbody>
			        
			        <?php
			            foreach($scores as $score)
			                echo '<tr><td>'.$score->username.'</td><td>'.$score->score.'</td></tr>';
			        ?>
		        
		        </tbody>
		   
		    </table>
		
		</div>

		<div class="col-lg-2">
		</div>
	
	</div>


</div>


</body>

</html>