<?php
    
    /*The data obtained from the form submission is stored in the variables username, name and password after 
    trimming spaces. If the variables are empty, the user is redirected to the sign up page. The values are 
    then inserted into the database. The password is encrypted using the SHA1 algorithm. Also, a new record 
    is created in the table scores that keeps track of the users' scores. The values are then assigned to 
    the session variables and the user is redirected to the profile page.*/

    session_start();
    
    $username=$name=$password="";
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
    	$username=trim($_POST['username']);
    	$name=trim($_POST['name']);
    	$password=$_POST['password'];
    }
    
    if(empty($username)==true||empty($name)==true||empty($password)==true)
    {
    	header('Location: signup');
    	exit;
    }

    DB::table('quiz_users')->insert(['username'=>$username,'name'=>$name,'password'=>sha1($password)]);
    
    DB::table('scores')->insert(['username'=>$username,'score'=>0]);
    
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$username;
    $_SESSION['wrongpassword']=false;
    
    header('Location: profile');
    exit;
?>