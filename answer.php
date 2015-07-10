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

	/*On clicking each button, the questions belonging to the category are displayed. Each question is
	  inside a div whose class is the category of the question. For this, first all questions are hidden
	  and after that only the questions with the class <insert category> are displayed*/

	$(".categorybutton").click(function()
	{

		if($(this).html()=="Show All")
		{
			$(".label").show();
			$(".mainquestionsitems").show();
		}
		if($(this).html()=="Sports")
		{
			$(".label").hide();
			$(".mainquestionsitems").hide();
			$(".sports").show();
		}
		if($(this).html()=="Movies")
		{
			$(".label").hide();
			$(".mainquestionsitems").hide();
			$(".movies").show();
		}
		if($(this).html()=="Art")
		{
			$(".label").hide();
			$(".mainquestionsitems").hide();
			$(".art").show();
		}
        if($(this).html()=="Music")
		{
			$(".label").hide();
			$(".mainquestionsitems").hide();
			$(".music").show();
		}
        if($(this).html()=="Pop Culture")
		{
			$(".label").hide();
			$(".mainquestionsitems").hide();
			$(".popculture").show();
		}
        if($(this).html()=="Misc")
		{
			$(".label").hide();
			$(".mainquestionsitems").hide();
			$(".misc").show();
		}

	});

    /*On clicking any particular question, the user is redirected to the page of that particular question.
      The qid is stored in a custom attribute and is obtained from there. The control is sent to a route
      with the qid as a parameter.*/

	$(".mainquestionsitems").click(function()
	{
		var qid=$(this).attr("data-qid");
		window.location.replace("answer/"+qid);

	});

});

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
    animation-name: fade;
	animation-duration: 0.25s;
	-webkit-animation-name: fade;
	-webkit-animation-duration: 0.25s;
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
.categorylist,.mainquestions
{
	height: 500px;
	margin-top: 50px;
	background-color: rgba(135,206,235,0.3);
	margin-left: 30px;
	overflow: auto;
}
.categorybutton
{
	margin-top: 20px;
	margin-bottom: 20px;
	height: 48px;
	font-size: 150%;
	font-family: Ubuntu;
}
.mainquestionsitems
{
	color: white;
	cursor: pointer;
	font-family: Ubuntu;
	animation-name: fade;
	animation-duration: 0.5s;
	-webkit-animation-name: fade;
	-webkit-animation-duration: 0.5s;
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

    //obtain questions to display on the page
    $questionstodisplay=DB::table('questions')->where('username','<>',$username)->get();

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


    <div class="row">

    	<div class="col-lg-3 categorylist">
    		
    		<button class="btn btn-default btn-block categorybutton">Show All</button>
    		<button class="btn btn-primary btn-block categorybutton">Sports</button>
    		<button class="btn btn-danger btn-block categorybutton">Movies</button>
    		<button class="btn btn-success btn-block categorybutton">Music</button>
    		<button class="btn btn-warning btn-block categorybutton">Pop Culture</button>
    		<button class="btn btn-info btn-block categorybutton">Art</button>
    		<button class="btn btn-default btn-block categorybutton">Misc</button>
    	
    	</div>

    	<div class="col-lg-1">
    	</div>

    	<div class="col-lg-7 mainquestions">

    		<?php
    		    
    		    /*The questions to display are obtained from the database and stored in an array. Each element
    		    of the array is read through a for loop. The question is first checked for whether it has been
    		    answered or not. Only if the question has not been answered, the rest of the code is run. First,
    		    the category of the question is obtained and a label is displayed. Each category has its own 
    		    coloured label. Then a div is created for displaying the question. The category is set as a 
    		    class attribute and a custom attribute, data-qid is made for storing the qid of the question.*/

    		    foreach($questionstodisplay as $q)
    		    {
    		    	$answeredqobj=DB::table('answered_questions')->where('username',$username)->where('qid',$q->qid)->first();
    		    	$answeredqarray=(array)$answeredqobj;
    		    	if(empty($answeredqarray))
    		    	{
    		    		switch($q->category)
    		    	    {    
    		    	    	case 'sports':
    		    	    	    $categorylabel='<h3><span class="label label-primary sports">';
    		        		    break;
    		    	    	case 'movies':
    		        		    $categorylabel='<h3><span class="label label-danger movies">';
    		        		    break;
    		    	    	case 'popculture':
    		        		    $categorylabel='<h3><span class="label label-warning popculture">';
    		    	    	    break;
    		        		case 'art':
    		        		    $categorylabel='<h3><span class="label label-info art">';
    		        		    break;
    		        		case 'music':
    		    	    	    $categorylabel='<h3><span class="label label-success music">';
    		          		    break;
    		    	    	case 'misc':
    		    	    	    $categorylabel='<h3><span class="label label-default misc">';
    		    	            break;
    		    	    }
    		    	    echo $categorylabel.$q->category.'</span></h3> '. 
    		    	    '<div class="mainquestionsitems '.$q->category.'" data-qid="'.$q->qid.'"><h3> '.$q->question.'</h3><hr></div>';
    		    	}
    		    }

    		?>

    	</div>

    </div>

</div>

</body>

</html>