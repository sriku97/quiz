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
}
.mainform
{
	height: 500px;
	margin-top: 50px;
	border-radius: 10px;
	background-color: rgba(0,0,0,0.6);
	border-width: 1px;
}
.form-group
{
	margin-top: 50px;
}
#formheading
{
	text-align: center;
	font-family: Ubuntu;
	color: #009933;
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

</style>

</head>

<body>


<?php 
    session_start();

    if(!isset($_SESSION['loggedin'])||!isset($_SESSION['username'])||$_SESSION['wrongpassword']==true)
    {
    	header('Location: login');
    	exit;
    }

    $username=$_SESSION['username'];
    $user=DB::table('quiz_users')->where('username',$username)->first();
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
               
                <button class="btn btn-warning btn-lg btn-block dropdown-toggle" id="welcome" type="button" data-toggle="dropdown">Welcome, <?php echo $user->name; ?>
                <span class="caret"></span></button>
               
                <ul class="dropdown-menu dropdown-menu-right">
                	<li id="dropdownlistitems"><a href="profile">Profile</a></li>
                    <li id="dropdownlistitems"><a href="logout">Logout</a></li>
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