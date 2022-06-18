<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


//include db connection
require_once "connect2.php";


$new_password = $confirm_password = "";             //saving new password
$new_password_err = $confirm_password_err = "";         //error message

//checking if button has already been clicked
if($_SERVER['REQUEST_METHOD'] == 'POST'){

//processing
if(empty(trim($_POST["new_password"]))){
    $new_password_err = "Please enter your new password";           //error message for empty password 
}elseif(strlen(trim($_POST["new_password"])) < 6){
    $new_password_err = "Password must be at least characters";     //error for password that are less than 6 chars
}else {
    $new_password = trim($_POST["new_password"]);
}

//validate the new password
if(empty(trim($_POST["new_password"]))){
    $confirm_password_err = "Please confirm your password";
}else{
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($new_password_err) && ($new_password) !== $confirm_password){
        $confirm_password_err = "Password didn't match. :(";
    }
}

//checking input error 
if(empty($new_password_err) && empty($confirm_password_err)){
    //create sql query for update data
    $sql = "UPDATE users SET password = ? WHERE id = ?";

    if($stmt = $HL2->prepare($sql)){
        $stmt->bind_param("si", $param_password, $param_id);

        $param_password = password_hash($new_password, PASSWORD_DEFAULT);
        $param_id = $_SESSION["id"];

        if($stmt->execute()){
            //if execution success, it will auto logout, then login again with the new password

            session_destroy();
            header("Location: login.php");
            exit();
        }else{
            echo "Something went wrong ! What did you do ?";   //error message if failed FATALLY
        }
        $stmt->close();
    }
}

$HL2->close();
}
?>


<!DOCTYPE html>
<html>
    <head>
    <title>Login Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
            crossorigin="anonymous">
        <style>
            body{
                font: 16px sans-serif;
                background-color: darkgray;
                color: black;
                text-align: center;
            }
            .wrapper{
                width: 375px;
                padding: 20px;
            }
            
        </style>
    </head>
    <body>
        <div class="wrapper">
            <h2>Reset Password</h2>
            <p>insert your new password</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : '';?>" value="<?php echo $new_password; ?>">
                    <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : '';?>">
                    <span class="invalid-feedback"><?php echo $confirm_password; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a class="btn btn-link ml-4" href="index.php">Cancel</a>
                </div>
                
            </form>
        </div>
    </body>
</html>
