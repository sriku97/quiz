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
.mainform
{
	height: 500px;
	margin-top: 50px;
	border-radius: 10px;
	background-color: rgba(0,0,0,0.6);
    animation-name: fade;
    animation-duration: 0.25s;
    -webkit-animation-name: fade;
    -webkit-animation-duration: 0.25s;
}
#formheading
{
    text-align: center;
    font-family: Ubuntu;
    color: #009933;
}
.form-group
{
	margin-top: 50px;
}
label
{
	font-size: 150%;
	font-family: Ubuntu;
	color: #FF3333;
}
.radio
{
	margin-left: 50px;
	font-family: Ubuntu;
	font-size: 200%;
	color: #009933;
}
.submitdiv
{
	text-align: center;
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
		
		<div class="col-lg-2">
		</div>
		
		<div class="col-lg-8 mainform">
			
			<h2 id="formheading">Submit a question</h2>

            <form class="form" name="submitquestion" action="submitquestion" method="POST">

            	<div class="form-group">
                    <label for="question">Enter your question :</label>
                    <input type="text" class="form-control" name="question" required autocomplete="off">
                </div>

                <div class="row form-inline">
                	
                	<div class="col-sm-3">
                		<div class="form-group">
                            <label for="option1">Option 1 :</label>
                            <input type="text" class="form-control" name="option1" required autocomplete="off">
                        </div>
                	</div>
                	
                	<div class="col-sm-3">
                		<div class="form-group">
                            <label for="option2">Option 2 :</label>
                            <input type="text" class="form-control" name="option2" required autocomplete="off">
                        </div>
                	</div>
                	
                	<div class="col-sm-3">
                		<div class="form-group">
                            <label for="option3">Option 3 :</label>
                            <input type="text" class="form-control" name="option3" required autocomplete="off">
                        </div>
                	</div>
                	
                	<div class="col-sm-3">
                		<div class="form-group">
                            <label for="option4">Option 4 :</label>
                            <input type="text" class="form-control" name="option4" required autocomplete="off">
                        </div>
                	</div>
               
                </div>

                <div class="row form-inline">
                	
                	<div class="form-group col-sm-8">
                	    
                	    <label for="correctoption">Correct Option : </label>
                	    <span class="radio"><input type="radio" id="correctoption" name="correctoption" value="A" required> A</input></span>
                	    <span class="radio"><input type="radio" name="correctoption" value="B"> B</input></span>
                	    <span class="radio"><input type="radio" name="correctoption" value="C"> C</input></span>
                	    <span class="radio"><input type="radio" name="correctoption" value="D"> D</input></span>
                	
                	</div>


                    <div class="form-group col-sm-4">
                        
                        <label for="category">Category : </label>
                       
                        <select class="form-control" name="category" id="category" required>
                            <option value="sports">Sports</option>
                            <option value="music">Music</option>
                            <option value="art">Art</option>
                            <option value="movies">Movies</option>
                            <option value="popculture">Pop Culture</option>
                            <option value="misc">Misc</option>
                        </select>
                  
                    </div>

                </div>

                <div class="row form-group submitdiv"> 
                	<button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>

                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            </form>

		</div>
		
		<div class="col-lg-2">
		</div>
	
	</div>

</div>

</body>

</html>