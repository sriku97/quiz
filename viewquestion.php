<?php
    /*The username of the logged-in user is obtained from the session variable. The qid of the question
      requested by the user is obtained from the myquestions page through an AJAX request, the database
      is searched and the details of the question are obtained. The object is then converted to JSON format,
      and sent as a response.*/ 

    session_start();
    $username=$_SESSION['username'];

    $question=DB::table('questions')->where('qid',$qid)->where('username',$username)->first();
    echo json_encode($question);

?>