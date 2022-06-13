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
            <h2>S I G N I N</h2>
                <p>Create an Account</p>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    <div class="form-group">
                        <label>USERNAME</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ?'is-invalid' : '';?>" value="<?php echo $username;?>">
                        <span class="invalid-feedback"><?php echo $username_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>PASSWORD</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : '' ?>" value="<?php echo $password; ?>">
                        <span class="invalid-feedback"><?php echo $password_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>CONFIRM PASSWORD</label>
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


<!---TO BE CONTINUED-->
