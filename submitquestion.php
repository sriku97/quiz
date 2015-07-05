<?php
    session_start();

    $username=$_SESSION['username'];
    $user=DB::table('quiz_users')->where('username',$username)->first();

    $question=$option1=$option2=$option3=$option4=$category=$correctoption="";

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
    	$question=$_POST['question'];
    	$option1=$_POST['option1'];
    	$option2=$_POST['option2'];
    	$option3=$_POST['option3'];
    	$option4=$_POST['option4'];
    	$correctoption=$_POST['correctoption'];
    	$category=$_POST['category'];
    }
    
    if(empty($question)||empty($category)||empty($correctoption)||empty($option4)||empty($option3)||empty($option2)||empty($option1))
    {
    	echo "<script>window.alert('Incomplete Credentials');</script>";
    	header('Location: ask');
    	exit;
    }

    DB::table('questions')->insert(['username'=>$username, 'question'=>$question, 'category'=>$category, 'option1'=>$option1, 'option2'=>$option2, 'option3'=>$option3, 'option4'=>$option4, 'correctoption'=>$correctoption]);
    header('Location: myquestions');
    exit;

?>