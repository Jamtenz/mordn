<?php

session_start();

if(isset($_SESSION['service_userid'])) {
    $_SESSION['service_userid'] = NULL;
    unset($_SESSION['service_userid']);
}

header("Location: signin.php");
die;