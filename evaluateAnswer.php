<?php
    /*The qid is obtained from the answer page through an AJAX request. The username is obtained 
      from the session variable. First, the server checks whether the question has been answered 
      or not. For this, an SQL query is made and the result is obtained as an object. This object
      is converted to an array and it checks whether the array is empty. If the question has 
      already been answered, then 'answered' is sent as a text response and the error message is 
      displayed. If the question has not been answered yet, the answer obtained from the user is
      checked with the correct answer by the server, and the text response is sent accordingly.
      The score is also incremented or decremented accordingly.*/ 


    session_start();
    
    $username=$_SESSION['username'];

    //check if question has been answered
    $answeredqobj=DB::table('answered_questions')->where('username',$username)->where('qid',$qid)->first();
    $answeredqarray=(array)$answeredqobj;

    if(!empty($answeredqarray))
    {
        echo 'answered';
    }
    else
    {
        $question=DB::table('questions')->where('qid',$qid)->first();

        //check if answer is correct and increment or decrement score accordingly
        if($question->correctoption==$answer)
        {
        	DB::table('answered_questions')->insert(['username'=>$username, 'qid'=>$qid]);
        	DB::table('scores')->where('username',$username)->increment('score');
        	echo 'correct';
        }    	
        else
        {
        	DB::table('answered_questions')->insert(['username'=>$username, 'qid'=>$qid]);
        	DB::table('scores')->where('username',$username)->decrement('score');
        	echo 'wrong';
        }
    }

?>