<?php
require_once "connect2.php"; 

$sql = "SELECT * from customers"; 
$result = $HL2->query($sql); 

if ($result->num_rows > 0) {
   echo "<br />";
    echo "<table border=1>";
    echo "<tr>";

?>

<!DOCTYPE HTML>
<html>
    <head>
    <title>Customers</title>
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

          

        <style>
            body{
                background-color: darkslategray;
            }

            h1{
                color: snow;
            }

            .navbar{
                display: flex;
                background-color: darkblue; 
                width: 100%;
            }

            .navbar a{
                color: white;
                padding: 14px 20px;
                text-align: center;
                text-decoration: none;
            }

            .navbar a:hover{
                background-color: black;
                color: grey;
            }
        </style>
    </head>

    <body>
        <div>
            <h1 style="text-align: center;">Our Customers From La-Li-Lu-Le-Lo </h1>
            </div>
        </div>
        
        <div class="navbar">
            <a href="input.php">Add Data</a>
            <a href="web/w1.html">Home</a>
            <a href="web/profil.html">News</a>
            <a href="#">FAQ</a>
            <a href="web/profil.html">About Us</a>
            <a href="web/flexcontact.html">Contact Us</a>
        </div>

        <div class="container-fluid p-4">
            <div class="row">
                <table border="1" class="table table-dark table-hover">
                    <thead>
                    <tr>
                                <th>Customer ID</th>
                                <th>Company Name</th>
                                <th>Contact Name</th>
                                <th>Contact Title</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Region</th>
                                <th>Postal Code</th>
                                <th>Country</th>
                                <th>Phone</th>
                                <th>Fax</th>
                                <th>Action</th>
                            </tr>
                    
    

    <?php
    echo "</tr>";
    include "connect2.php";
    $sql = "SELECT * FROM customers";
    $result = mysqli_query($HL2,$sql);
    while ($row = mysqli_fetch_array($result)) {

    ?>
      <tbody>
          <tr>
              <td><?php echo $row['CustomerID']; ?></td>
              <td><?php echo $row['CompanyName']; ?></td>
              <td><?php echo $row['ContactName']; ?></td>
              <td><?php echo $row['ContactTitle']; ?></td>
              <td><?php echo $row['Address']; ?></td>
              <td><?php echo $row['City']; ?></td>
              <td><?php echo $row['Region']; ?></td>
              <td><?php echo $row['PostalCode']; ?></td>
              <td><?php echo $row['Country']; ?></td>
              <td><?php echo $row['Phone']; ?></td>
              <td><?php echo $row['Fax']; ?></td>
              <td>
                  <a href="edit2.php?CustomerID=<?php echo $row['CustomerID'];?>" class="btn btn-warning">EDIT</a>
                  <a href="delete2.php?CustomerID=<?php echo $row['CustomerID'];?>" class="btn btn-danger">DELETE</a>
              </td>
          </tr>
      </tbody>
    </div>
<?php
      }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $HL2->close();
?>
</body>
</html>




































































































































































































































































<!--S-->
<!--O-->
<!--Y-->
<!--O-->
<!--U-->
<!--T-->
<!--H-->
<!--I-->
<!--N-->
<!--K-->
<!--I-->
<!--T-->
<!--S-->
<!--R-->
<!--E-->
<!--A-->
<!--L-->
<!--L-->
<!--Y-->
<!--G-->
<!--O-->
<!--O-->
<!--D-->
<!--Y-->
<!--E-->
<!--A-->
<!--H-->
<!--Y-->
<!--O-->
<!--U-->
<!--S-->
<!--H-->
<!--O-->
<!--U-->
<!--L-->
<!--D-->
<!--T-->
<!--R-->
<!--Y-->
<!--M-->
<!--A-->
<!--K-->
<!--I-->
<!--N-->
<!--G-->
<!--T-->
<!--H-->
<!--E-->
<!--B-->
<!--L-->
<!--O-->
<!--O-->
<!--D-->
<!--Y-->
<!--T-->
<!--H-->
<!--I-->
<!--N-->
<!--G-->
<!--U-->
<!--P-->
<!--I-->
<!--T-->
<!--S-->
<!--A-->
<!--R-->
<!--E-->
<!--A-->
<!--L-->
<!--P-->
<!--A-->
<!--I-->
<!--N-->
<!--I-->
<!--N-->
<!--T-->
<!--H-->
<!--E-->
<!--A-->
<!--R-->
<!--S-->
<!--E-->

