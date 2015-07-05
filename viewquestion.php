<?php
    $question=DB::table('questions')->where('qid',$qid)->first();
    echo json_encode($question);
?>