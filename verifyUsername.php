<?php
    $result=DB::table('quiz_users')->where('username',$username)->first();
    if(empty($result))
    	echo "true";
    else
    	echo "false";
?>