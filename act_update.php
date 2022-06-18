<?php
include "connect2.php";

if ($_POST['submit']=="SUBMIT"){//Jika tombol submit dibaca dan nilai hasil bacaanya adalah "SUBMIT"
    //membaca input-an
    $CustomerID     = $_POST['CustomerID'];
    $CompanyName    = $_POST['CompanyName'];
    $ContactName    = $_POST['ContactName'];
    $ContactTitle   = $_POST['ContactTitle'];
    $Address        = $_POST['Address'];
    $City           = $_POST['City'];
    $Region         = $_POST['Region'];
    $PostalCode     = $_POST['PostalCode'];
    $Country        = $_POST['Country'];
    $Phone          = $_POST['Phone'];
    $Fax            = $_POST['Fax'];
//membuat query sql untuk Update Data
    $sql = "UPDATE customers SET CompanyName = '$CompanyName', ContactName = '$ContactName', ContactTitle = '$ContactTitle', Address = '$Address', City = '$City', Region = '$Region', PostalCode = '$PostalCode', Country = '$Country', Phone = '$Phone', Fax = '$Fax' WHERE CustomerID = '$CustomerID'"; 
//Menjalankan.
    if($HL2->query($sql) ===TRUE){

?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPDATE DATA</title>
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
    <h1>Data Updated</h1>
    <div class="d-grid">
        <button type="button" class="btn btn-success btn-block">
            <a href="view2.php">Return</a>
        </button>
    </body>
    
</html>






<?php    
    }else{
        echo "Error : " . $sql . "<br />" . $HL2->error;
        echo "<a href='view2.php'>Return</a>";
    }

    $HL2->close();

}

?>