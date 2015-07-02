<?php
    session_start();
    $username=$name=$password="";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
    	$username=$_POST['username'];
    	$name=$_POST['name'];
    	$password=$_POST['password'];
    }
    if(empty($username)==true||empty($name)==true||empty($password)==true)
    {
    	echo "<script>window.alert('Incomplete Credentials');</script>";
    	header('Location: signup');
    	exit;
    }

    DB::table('quiz_users')->insert(['username'=>$username,'name'=>$name,'password'=>sha1($password)]);
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$username;
    $_SESSION['wrongpassword']=false;
    header('Location: profile');
    exit;
?>