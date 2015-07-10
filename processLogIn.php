<?php
    /*The data obtained from the form submission is stored in the variables username and password. If the 
    variables are empty, the user is redirected to the login page. The record of the entered username is 
    obtained from the database. If the username doesn't exist, the user is redirected to the login page.
    If the password is correct, the session variables are set, and  the user is redirected to the profile 
    page. Else, the user is redirected back to the login page and the error message is displayed.*/

    session_start();
    
    $username=$password="";
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
    	$username=$_POST['username'];
    	$password=$_POST['password'];
    }
    
    if(empty($username)==true||empty($password)==true)
    {
    	header('Location: login');
    	exit;
    }

    $result=DB::table('quiz_users')->where('username',$username)->first();
    
    if(empty($result))
    {
    	header('Location: login');
    	exit;
    }
    
    if(sha1($password)==$result->password)
    {
    	$_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        $_SESSION['wrongpassword']=false;
        header('Location: profile');
        exit;
    }
    else
    {
    	$_SESSION['wrongpassword']=true;
    	header('Location: login');
    	exit;
    }

?>