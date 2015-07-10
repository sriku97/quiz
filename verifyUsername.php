<?php
    /*Used for verification of username while signing up. Username is obtained from the
      sign up page and checked against the database. Returns true if username is not found
      and false if otherwise.*/

    $result=DB::table('quiz_users')->where('username',$username)->first();
    
    if(empty($result))
    	echo "true";
    else
    	echo "false";
?>