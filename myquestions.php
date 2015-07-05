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

$(document).ready(function(){

	$(".questionlistitems").click(function(){
		
		var qid=$(this).attr("data-qid");
		
		$.ajax({
    		async: false,
    		type:"GET",
    		success: function(result)
    		{
    			var obj=JSON.parse(result);

    			$("#qid").text("Question ID : "+obj.qid);
    			$("#question").text(obj.question);
    			$("#option1").text("1. "+obj.option1);
    			$("#option2").text("2. "+obj.option2);
    			$("#option3").text("3. "+obj.option3);
    			$("#option4").text("4. "+obj.option4);

    			switch(obj.correctoption)
    			{
    				case "A": $("#option1").css("color","#009933");
    				          $("#option2").css("color","white");
    				          $("#option3").css("color","white");
    				          $("#option4").css("color","white");
    				          break;
    				case "B": $("#option2").css("color","#009933");
    				          $("#option1").css("color","white");
    				          $("#option3").css("color","white");
    				          $("#option4").css("color","white");
    				          break;
    				case "C": $("#option3").css("color","#009933");
    				          $("#option2").css("color","white");
    				          $("#option1").css("color","white");
    				          $("#option4").css("color","white");
    				          break;
    				case "D": $("#option4").css("color","#009933");
    				          $("#option2").css("color","white");
    				          $("#option3").css("color","white");
    				          $("#option1").css("color","white");
    				          break;
    			}
    		
    		},
    		url: "viewquestion/"+qid
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
}
.questionlist
{
	height: 500px;
	margin-top: 50px;
	background-color: rgba(135,206,235,0.3);
	margin-left: 30px;
	overflow: auto;
}
.questionlistitems
{
	color: white;
	cursor: pointer;
}
.questiondetails
{
	height: 500px;
	margin-top: 50px;
	background-color: rgba(0,0,0,0.6);
	margin-left: 30px;
	border-radius: 10px;
	overflow: auto;
}
#qid
{
	color: #FF3333;
}
#question,#option1,#option4,#option3,#option2
{
	color:white;
}

</style>

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

    $questions=DB::table('questions')->where('username',$username)->get();

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

    	<div class="col-lg-3 questionlist">
    		
    		<?php
    		    
    		    foreach($questions as $q)
    		    {
    		    	switch($q->category)
    		    	{    
    		    		case 'sports':
    		    		    $categorylabel='<h3><span class="label label-primary">';
    		    		    break;
    		    		case 'movies':
    		    		    $categorylabel='<h3><span class="label label-danger">';
    		    		    break;
    		    		case 'popculture':
    		    		    $categorylabel='<h3><span class="label label-warning">';
    		    		    break;
    		    		case 'art':
    		    		    $categorylabel='<h3><span class="label label-info">';
    		    		    break;
    		    		case 'music':
    		    		    $categorylabel='<h3><span class="label label-success">';
    		    		    break;
    		    		case 'misc':
    		    		    $categorylabel='<h3><span class="label label-default">';
    		    		    break;
    		    	}
    		    	echo $categorylabel.$q->category.'</span></h3> '. 
    		    	    '<div class="questionlistitems" data-qid="'.$q->qid.'"><h3> '.$q->question.'</h3><hr></div>';
    		    }

    		?>
    	
    	</div>

    	<div class="col-lg-1">
    	</div>

    	<div class="col-lg-7 questiondetails">

    		<h1 id="qid"></h1>
    		<br>
    		<h2 id="question"></h2>
    		<br>
   			<h2 id="option1"></h2>
    		<h2 id="option2"></h2>
    		<h2 id="option3"></h2>
    		<h2 id="option4"></h2>
    	
    	</div>

    </div>
    
</div>

</body>

</html>