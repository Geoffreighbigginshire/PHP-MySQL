<!DOCTYPE html>
<html>
    <head>
        <title>INPUT DATA</title>
        <style>
            body{
                background-color: black;
                color: white;
                font-family: Arial, Helvetica, sans-serif;
                padding-top: 20px;
                text-align: center;
            }

            .submit_button{
	            background: darkblue;
	            color: white;
	            font-size: 25px;
                font-style: bold;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	            width: 100%;
                border: none;
	            border-radius: 3px;
	            padding: 10px 20px;
            }
            .submit_button:hover{
                color: darkblue;
                background-color: white;
            }
            .input_form{
	            box-sizing : border-box;
	            width: 100%;
	            padding: 10px;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
	            font-size: 15px;
	            margin-bottom: 10px;
                background-color: blue;
                ;
            }   

        </style>
    </head>
    <body>
        <div class="p">
            <h1 style="font-family: 'Times New Roman', Times, serif;">Input Data for Customers</h1>
                <div class="input_form">
                <form method="post" action="act_input.php">
                    <label for="CustomerId">Customer ID :</label><br>
                    <input type="text" name="CustomerID" placeholder="0000"><br>
                    <label for="CompanyName">Company Name : </label><br>
                    <input type="text" name="CompanyName" placeholder="Company Name...."><br>
                    <label for="ContactName">Contact Name :</label><br>
                    <input type="text" name="ContactName" placeholder="Contact Name...."><br>
                    <label for="ContactTitle">Title :</label><br>
                    <input type="text" name="ContactTitle" placeholder="Contact Title...."><br>
                    <label for="Address">Address :</label><br>
                    <input type="text" name="Address" placeholder="Address..."><br>
                    <label for="City">City :</label><br>
                    <input type="text" name="City" placeholder="City"><br>
                    <label for="Region">Region :</label><br>
                    <input type="text" name="Region" placeholder="Region"><br>
                    <label for="PostalCode">Postal Code :</label><br>
                    <input type="text" name="PostalCode" placeholder="Postal Code..."><br>
                    <label for="Country">Country :</label><br>
                    <input type="text" name="Country" placeholder="Country..."><br>
                    <label for="Phone">Phone :</label><br>
                    <input type="text" name="Phone" placeholder="088888888"><br>
                    <label for="Fax">Fax :</label><br>
                    <input type="text" name="Fax" placeholder="099999999"><br>
                    <br />
                </div>  
                    <input type="submit" class="submit_button" name="submit" value="SUBMIT"><br>
            </form>
        </div>
    </body>
</html>