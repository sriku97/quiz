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
#welcome
{
	padding: 12px;
	font-family: verdana;
	margin-top: 25px;
	font-size: 120%;
}
#dropdownlistitems
{
	font-family: Ubuntu;
	font-size: 120%;
    text-align: left;
}
#ask,#answer,#leaderboard,#myquestions
{
	margin-top: 50px;
	height: 450px;
	font-family: Ubuntu;
	color: white;
	text-align: center; 
}
.nav-tabs li 
{
    font-size:150%;
    width: 285px;
    text-align: center;
    font-family: Ubuntu;
}
@keyframes fade
{
    0%
    {
        opacity: 0;
    }
}
@-webkit-keyframes fade
{
    0%
    {
        opacity: 0;
    }
}

</style>

</head>

<body>


<?php 
   
    session_start();

    /*If not logged in, redirect to the login page. Login details are stored in the session variables 
    'loggedin','username' and 'wrongpassword'. 'Loggedin' stores a boolean value that is used to check 
    whether the user is logged in. 'Username' stores the username of the logged-in user. 'Wrongpassword'
    stores a boolean value. If the value is true, then the user has entered the wrong password at the 
    login page this is used to show the error message at the login page*/

    if(!isset($_SESSION['loggedin'])||!isset($_SESSION['username'])||$_SESSION['wrongpassword']==true)
    {
    	header('Location: login');
    	exit;
    }

    //obtain user details
    $username=$_SESSION['username'];
    $user=DB::table('quiz_users')->where('username',$username)->first();

    //obtain user score
    $score=DB::table('scores')->where('username',$username)->first();

?>


<div class="container-fluid">
	

	<div class="row">
		
		<div class="col-lg-1">
		</div>
		
		<div class="col-lg-3">
			<h1 class="logo">The Spider Quiz</h1>
		</div>
		
		<div class="col-lg-5">
		</div>

		<div class="col-lg-3">
			
			<div class="dropdown">
                
                <button class="btn btn-warning btn-lg btn-block dropdown-toggle" id="welcome" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Welcome, <?php echo $user->name; ?>
                <span class="caret"></span></button>
                
                <ul class="dropdown-menu dropdown-menu-right">
                    
                    <li id="dropdownlistitems"><a><span class="glyphicon glyphicon-tasks"></span> Score : <?php echo $score->score;?></a></li>
                    <li id="dropdownlistitems"><a href="profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                    <li id="dropdownlistitems"><a href="ask"><span class="glyphicon glyphicon-question-sign"></span> Ask</a></li>
                    <li id="dropdownlistitems"><a href="answer"><span class="glyphicon glyphicon-ok-circle"></span> Answer</a></li>
                    <li id="dropdownlistitems"><a href="myquestions"><span class="glyphicon glyphicon-paperclip"></span> My Questions</a></li>
                    <li id="dropdownlistitems"><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                
                </ul>
             
            </div>
		
		</div>
	
    </div>


    <div class="container">
    
        <div class="tab-content">
            
            <div class="tab-pane fade in active" id="ask">
            	<h1>Ask</h1>
            	<br>
            	<h3>Submit questions for other users to answer</h3>
            	<br><br><br>
            	<a href="ask"><img src="ask.jpg" class="img-thumbnail"></a>
            </div>
            
            <div class="tab-pane fade" id="answer">
            	<h1>Answer</h1>
            	<br>
            	<h3>Answer other users' questions and raise your score</h3>
            	<br><br><br>
            	<a href="answer"><img src="answer.jpg" class="img-thumbnail"></a>
            </div>
            
            <div class="tab-pane fade" id="leaderboard">
            	<h1>Rankings</h1>
            	<br>
            	<h3>Find out where you stand</h3>
            	<br><br><br>
            	<a href="leaderboard" target="_BLANK"><img src="leaderboard.jpg" class="img-thumbnail"></a>
            </div>

            <div class="tab-pane fade" id="myquestions">
                <h1>My Questions</h1>
                <br>
                <h3>See all the questions you've posted</h3>
                <br><br><br>
                <a href="myquestions"><img src="myquestions.jpg" class="img-thumbnail"></a>
            </div>
        
        </div>

        <ul class="nav nav-tabs">
            <li class="nav active"><a href="#ask" data-toggle="tab">Ask Questions</a></li>
            <li class="nav"><a href="#answer" data-toggle="tab">Answer Questions</a></li>
            <li class="nav"><a href="#leaderboard" data-toggle="tab">Leaderboard</a></li>
            <li class="nav"><a href="#myquestions" data-toggle="tab">My Questions</a></li>
        </ul>
    
    </div>

    
</div>
</body>

</html>