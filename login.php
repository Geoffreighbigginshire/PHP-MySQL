<?php
    session_start();    //initialize session inside PHP


    //Checking if an user is already logging in. If it's done, it'll redirect to index.php
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php");
        exit;
    }

    require_once "connect2.php";

    $username     = $password = "";     //definisi variable & beri nilai kosong terlebih dahulu
    $username_err = $password_err = $login_err = "";

    //processing data, if submitted.
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        //Validate form
        if(empty(trim($_POST["username"]))){                    //Checking if username is empty
            $username_err = "Please enter a username";
        }else{
            $username = trim($_POST["username"]);
        }

        if(empty(trim($_POST["password"]))){                    //Checking if password is empty
            $password_err = "Please enter a goddamn password";
        }else{
            $password = trim($_POST["password"]);
        }

        //validate login
        if(empty($username_err) && empty($password_err)){
            $sql = "SELECT id, username, password FROM users WHERE username = ?";       //query SELECT (SQL) for selecting one data.

            if($stmt = $HL2->prepare($sql)){
                $stmt->bind_param("s", $param_username);
                $param_username = $username;

                if($stmt->execute()){
                    $stmt->store_result();

                    //checking if inputted username is registered. If it's true, then verify the password
                    if($stmt->num_rows == 1){
                        $stmt->bind_result($id, $username, $hashed_password);
                        if($stmt->fetch()){
                            if(password_verify($password, $hashed_password)){           //if password is correct with the password in the database
                                session_start();
                                
                                //saving login info into session variable
                                $_SESSION["loggedin"] = true;               //status login  
                                $_SESSION["id"]       = $id;                //logged in id info
                                $_SESSION["username"] = $username;          //logged in username info

                                //redirect to index.php 
                                header("location:index.php");
                            }else{
                                //if password is invalid
                                $login_err = "Username and Password is incorrect ! Try Again";      //error message
                            }
                        }
                    }else{
                        $login_err = "you don't exist";   //error message if username isn't exist in the database
                    }
                }else{
                    echo "Something went wrong. Try. Again";
                }

                $stmt->close(); 
            }
        }

        $HL2->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
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
            <h2>Login</h2>
                <?php
                if(!empty($login_err)){
                    echo '<div class="alert alert-danger">' .$login_err. '</div>';
                }
                ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Username</label> <br/>
                    <input type="text" name="username" class="from-control <?php echo (!empty($username_err)) ? 'is-invalid' : '';?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Password</label> <br/>
                    <input type="password" name="password" class="from-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <br />
                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-success" value="Login">
                </div>
                <p>Don't have an account ? <a href="register.php">sign up</a></p> <p><a href="resetpass.php">Forgot Password ?</a></p>
            </form>
        </div>
    </body>
</html>
