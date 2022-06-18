<?php

session_start();

//unset session
$_SESSION = array();

//destrou session
session_destroy();

//redirect to login.php
header('location: login.php');
exit;

?>