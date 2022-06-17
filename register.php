<?php
require_once "connect2.php";


//define variable

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

//processing data -> inputting new account into user table in DB
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //validate username
    if (empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/',trim($_POST["username"]))){      //Letters (character) that can be contained within the "username" box or column
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";                            //preparing sql if username exist

        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("s",$param_username);

            //creating parameter
            $param_username = trim($_POST["username"]);

            //executing statement
            if($stmt->execute()){

                $stmt->store_result();  //results are saved in stats


                if($stmt->num_rows() == 1){
                    $username_err = "This username is already taken";
                } else{
                    $username = trim($_POST["username"]);
                }

            }else{
                echo "Aren't you forgetting something? Please try again later";
            }

            $stmt->close();         //closing connection
        }
    }
    //validate password

    if (empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    //validation for confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm your password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);

        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match";
        }
    } 

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ss",$param_username, $param_password);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            if($stmt->execute()){
                header("location: login.php");
            } else{
                echo "Something's wrong, Try Again ! Later.";
            }

            $stmt->close();
        }
    }
    $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>S I G N  I N</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
            crossorigin="anonymous">
        <style>
            body{
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
            <h2>SIGN IN</h2>
                <p>Create an account</p>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ?'is-invalid' : '';?>" value="<?php echo $username;?>">
                        <span class="invalid-feedback"><?php echo $username_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : '' ?>" value="<?php echo $password; ?>">
                        <span class="invalid-feedback"><?php echo $password_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : '' ?>" value="<?php echo $confirm_password; ?>">
                        <span class="invalid-feedback"><?php echo $confirm_password_err;?></span>
                    </div>
                    <br />
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Submit">

                        <input type="reset" class="btn btn-secondary ml-3" value="Reset">
                    </div>
                    <p>Already have an account ??? <a href="login.php">LOG IN</a></p>
                    </form>
        </div>
    </body>
</html>



