<?php
    session_start();
    $username=$password="";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
    	$username=$_POST['username'];
    	$password=$_POST['password'];
    }
    if(empty($username)==true||empty($password)==true)
    {
    	echo "<script>window.alert('Incomplete Credentials');</script>";
    	header('Location: login');
    	exit;
    }

    $result=DB::table('quiz_users')->where('username',$username)->first();
    if(empty($result))
    {
    	echo "<script>window.alert('Username doesn't exist');</script>";
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