<?php 
    /*Global array session is re-initialised to nothing, the session is destroyed
    and the user is redirected to the home page*/

    session_start();

    $_SESSION=array();
    session_destroy();
    
    header('Location: /');
    exit;
?>