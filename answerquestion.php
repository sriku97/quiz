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
    /* The answer is first obtained from the radio button that is checked. In the case that
    the submit button is clicked without any option selected, the rest of the code is skipped.
    Then an AJAX request is sent to the the route that processes the answer with the qid and
    answer as its parameters. The processing is taken care of by the other file and based on 
    the response, the result div is displayed accordingly.*/

    $(".submitbutton").click(function()
    {

        var answer=$("input[name='options']:checked").val();
        if(typeof answer==='undefined')
        {
            return false;
        }

        $.ajax(
        {

            async: false,
            type: "GET",
            success: function(result)
            {
                if(result=='correct')
                {
                    $(".questionarea").hide();
                    $(".correctresult").show();
                }
                else if(result=='wrong')
                {
                    $(".questionarea").hide();
                    $(".wrongresult").show();
                }
                else if(result=='answered')
                {
                    $(".questionarea").hide();
                    $(".answered").show();
                }
            },
            url: "../evaluateAnswer/"+<?php echo $qid; ?>+"/"+answer

        });

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
.backbutton
{
    margin-top: 50px;
    font-size: 500%;
}
.questionarea,.correctresult,.wrongresult,.answered
{
	height: 500px;
	margin-top: 50px;
	border-radius: 10px;
	background-color: rgba(0,0,0,0.6);
	border-width: 1px;
	overflow: auto;
    display: none;
}
.questionarea
{
    display: block;
    animation-name: fade;
    animation-duration: 0.25s;
    -webkit-animation-name: fade;
    -webkit-animation-duration: 0.25s;
}
.correctresult,.wrongresult,.answered
{
    text-align: center;
}
.resultmessagecorrect
{
    margin-top: 150px;
    color: green;
}
.resultmessagewrong,.resultmessageanswered
{
    margin-top: 150px;
    color: red;
}
#qid
{
	color: #FF3333;
}
#poster
{
    color:blue;
}
#question,#option1,#option4,#option3,#option2
{
	color:white;
}
.categorylabel,.submitbutton
{
    float: right;
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
    	header('Location: ../login');
    	exit;
    }

    //obtain user details
    $username=$_SESSION['username'];
    $user=DB::table('quiz_users')->where('username',$username)->first();
    
    //obtain user score
    $score=DB::table('scores')->where('username',$username)->first();

    /*The question to display is obtained from the database through the qid obtained from the answer page.
      The database is searched for the question and if it has already been answered, the user is redirected
      to the answer page.*/

    //obtain question to display
    $question=DB::table('questions')->where('qid',$qid)->first();
    
    //redirect if question has been answered
    $answeredqobj=DB::table('answered_questions')->where('username',$username)->where('qid',$question->qid)->first();
    $answeredqarray=(array)$answeredqobj;

    if(!empty($answeredqarray))
    {
        header('Location: ../answer');
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
		
		<div class="col-lg-5">
		</div>

		<div class="col-lg-3">
			
			<div class="dropdown">
                
                <button class="btn btn-warning btn-lg btn-block dropdown-toggle" id="welcome" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Welcome, <?php echo $user->name; ?>
                <span class="caret"></span></button>
                
                <ul class="dropdown-menu dropdown-menu-right">
                    
                    <li id="dropdownlistitems"><a><span class="glyphicon glyphicon-tasks"></span> Score : <?php echo $score->score;?></a></li>
                    <li id="dropdownlistitems"><a href="../profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                    <li id="dropdownlistitems"><a href="../ask"><span class="glyphicon glyphicon-question-sign"></span> Ask</a></li>
                    <li id="dropdownlistitems"><a href="../answer"><span class="glyphicon glyphicon-ok-circle"></span> Answer</a></li>
                    <li id="dropdownlistitems"><a href="../myquestions"><span class="glyphicon glyphicon-paperclip"></span> My Questions</a></li>
                    <li id="dropdownlistitems"><a href="../logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                
                </ul>
             
            </div>
		
		</div>
	
    </div>

    <div class="row">

    	<div class="col-lg-2">
            <a class="backbutton" href="../answer"><span class="glyphicon glyphicon-circle-arrow-left"></span></a>
    	</div>

    	<div class="col-lg-8 questionarea">

    		<h1><span id="qid">Question ID : <?php echo $question->qid; ?></span>
    		<span class="categorylabel">
    			<?php
    		        
                    /*Based on the category obtained from the server, the category is displayed as
                      a label. Each cetegory has its own coloured label.*/
    		    	switch($question->category)
    		    	{    
    		    		case 'sports':
    		    		    $categorylabel='<span class="label label-primary">';
    		    		    break;
    		    		case 'movies':
    		    		    $categorylabel='<span class="label label-danger">';
    		    		    break;
    		    		case 'popculture':
    		    		    $categorylabel='<span class="label label-warning">';
    		    		    break;
    		    		case 'art':
    		    		    $categorylabel='<span class="label label-info">';
    		    		    break;
    		    		case 'music':
    		    		    $categorylabel='<span class="label label-success">';
    		    		    break;
    		    		case 'misc':
    		    		    $categorylabel='<span class="label label-default">';
    		    		    break;
    		    	}
    		    	echo $categorylabel.$question->category.'</span> ';

    		    ?>
    		</span>
    	    </h1>
    	    <br>
    	    <h2 id="poster">~<?php echo $question->username; ?></h2>
    		<br>
    		<h2 id="question"><?php echo $question->question; ?></h2>
   			<h2 id="option1"> <input type="radio" name="options" value="A"><?php echo " ".$question->option1; ?></input></h2>
    		<h2 id="option2"> <input type="radio" name="options" value="B"><?php echo " ".$question->option2; ?></input></h2>
    		<h2 id="option3"> <input type="radio" name="options" value="C"><?php echo " ".$question->option3; ?></input></h2>
    		<h2 id="option4"> <input type="radio" name="options" value="D"><?php echo " ".$question->option4; ?></input></h2>

    		<button class="btn btn-success btn-lg submitbutton">Submit</button>

    	</div>

        <div class="col-lg-8 correctresult">
            <h1 class="resultmessagecorrect">Right Answer! +1</h1>
            <a href="../answer"><h2>Return to previous page</h2></a>
        </div>

        <div class="col-lg-8 wrongresult">
            <h1 class="resultmessagewrong">Wrong Answer! -1</h1>
            <a href="../answer"><h2>Return to previous page</h2></a>
        </div>   

        <div class="col-lg-8 answered">
            <h1 class="resultmessageanswered">This question has already been answered!</h1>
            <a href="../answer"><h2>Return to previous page</h2></a>
        </div> 

    	<div class="col-lg-2">
    	</div>

    </div>

</div>

</body>

</html>