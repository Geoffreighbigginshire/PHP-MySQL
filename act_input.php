<?php
include "connect2.php";

if($_POST['submit']=="SUBMIT"){
    $CustomerID = $_POST['CustomerID'];
    $CompanyName = $_POST['CompanyName'];
    $ContactName = $_POST['ContactName'];
    $ContactTitle = $_POST['ContactTitle'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $Region = $_POST['Region'];
    $PostalCode = $_POST['PostalCode'];
    $Country = $_POST['Country'];
    $Phone = $_POST['Phone'];
    $Fax = $_POST['Fax'];
}
    $sql = "INSERT INTO customers (CustomerID, CompanyName, ContactName, ContactTitle, Address, City, Region, PostalCode, Country, Phone, Fax) VALUES ('$CustomerID', '$CompanyName', '$ContactName', '$ContactTitle', '$Address', '$City', '$Region', '$PostalCode', '$Country', '$Phone', '$Fax')";

    if($HL2->query($sql)===TRUE){

?>
<!DOCTYPE html>    
    <head>
        <title>ACTINPUT</title>
        <style>
            body{
                background-color: black;
                color: white;
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                font-weight: 200;
                text-align: center;
                margin-top: 20px;
            }
            .link{
                background-color: black;
                color: green;
                height: 40px;
            }
            .link:hover{
                color: black;
                background-color: green;
            }
        </style>
    </head>        
    <body>
        <h1>DATA SUCCESSFULLY ADDED !!!</h1>
            <div class="link">
                <a href="view2.php">RETURN</a>
            </div>
    </body>

<?php
    }else{
        echo "Unable to Add Data : ". $sql ."<br>". $HL2->error;
    }


    $HL2->close();
?>