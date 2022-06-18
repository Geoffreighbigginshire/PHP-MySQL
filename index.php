<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
            crossorigin="anonymous">
        <style>
            body{
                font: 16px sans-serif;
                text-align: center;
            }
        </style>    
    </head>
    <body>
        <h1 class="my-5">Welcome, <b><?php echo htmlspecialchars($_SESSION["username"]);?></b></h1>
        <h4>have a nice session</h4>
        <p>
            <a href="resetpass.php" class="btn btn-warning">Reset Password</a>
            <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a>
        </p>

    </body>
</html>
