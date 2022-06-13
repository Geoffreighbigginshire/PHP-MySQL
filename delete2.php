<?php
require "connect2.php";

$CustomerID = $_GET['CustomerID'];

//Query SQL
$sql = "DELETE from customers WHERE CustomerID = '$CustomerID'";

$result = $HL2->query($sql);

if($HL2->query($sql) === TRUE){

?>
<!DOCTYPE html>
<html>
<head>
        <title>DELETE DATA</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
         rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous"
        />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
          crossorigin="anonymous"
          ></script>
    </head>
    <body style="background-color: darkgray; color: white; text-align: center;">
    <h1>Data Deleted</h1>
    <div class="d-grid">
        <button type="button" class="btn btn-success btn-block">
            <a href="view2.php">Return</a>
        </button>
    </body>
</html>



<?php
}else{
    echo "Error : ". $sql . "<br />" . $HL2->error;
    echo "<a href='view2.php'>RETURN</a>";
}

$HL2->close();
?>