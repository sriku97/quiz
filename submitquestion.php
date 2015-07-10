<?php
    /*First, user details are obtained from the session variables. Then the form data obtained from the 
      'ask' page is stored in variables. After validation, they are stored in the database and the user 
      is redirected to the 'myquestions' page which displays all the questions the user has asked.*/

    session_start();

    //obtain user details
    $username=$_SESSION['username'];
    $user=DB::table('quiz_users')->where('username',$username)->first();

    //variables for storing post data
    $question=$option1=$option2=$option3=$option4=$category=$correctoption="";

    //assign post data to variables
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
    	$question=trim($_POST['question']);
    	$option1=trim($_POST['option1']);
    	$option2=trim($_POST['option2']);
    	$option3=trim($_POST['option3']);
    	$option4=trim($_POST['option4']);
    	$correctoption=$_POST['correctoption'];
    	$category=$_POST['category'];
    }
    
    //if any of the inputs are empty, redirect to the ask page
    if(empty($question)||empty($category)||empty($correctoption)||empty($option4)||empty($option3)||empty($option2)||empty($option1))
    {
    	header('Location: ask');
    	exit;
    }

    //insert values into the database
    DB::table('questions')->insert(['username'=>$username, 'question'=>$question, 'category'=>$category, 'option1'=>$option1, 'option2'=>$option2, 'option3'=>$option3, 'option4'=>$option4, 'correctoption'=>$correctoption]);

    //redirect to myquestions page
    header('Location: myquestions');
    exit;

?>