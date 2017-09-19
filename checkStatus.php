<?php
    session_start();
    if(isset($_SESSION['user_session']) && $_SESSION['user_session'] != '')
        echo true;

    else 
        echo false;
?>