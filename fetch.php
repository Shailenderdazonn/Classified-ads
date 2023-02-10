<?php
    // Connect to the MySQL server and select the database
    $conn = new mysqli('localhost','root','','image-database');
	
	if(isset($_POST['submit'])){
   
     $username = $_POST['username'];
    $email = $_POST['email'];
	$mobile = $_POST['mobile'];
   
    $select_count = count($_POST['select']);
    for($i=0; $i<$select_count; $i++){
        $select = $_POST['select'][$i];
        $sql = "INSERT INTO dropdown (username,email,mobile,select_value) VALUES ('$username','$email','$mobile','$select')";
        mysqli_query($conn, $sql);
    }
   // header("Location: index.php");
}
?>

<form action="" method="post" class="form">

 <label for="username">Username:</label><br/>
        <input type="text" id="username" name="username"><br/>

        <label for="email">Email:</label><br/>
        <input type="email" id="email" name="email"><br/>

        <label for="Mobile">Mobile:</label><br/>
        <input type="text" id="mobile" name="mobile"><br/>

        <label for="Mobile">Select Any One:</label><br/>
    <select name="select[]">
    <option value="option1">Select Option</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select><br/><br/>
    
    <input type="submit" name="submit" value="Submit">
</form>




<?php
 $conn = new mysqli('localhost','root','','image-database');


 
$sql="SELECT * FROM dropdown";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>Fecth database to table form</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
 
<body>
    <section>
	<table>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Select Category</th>
				
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['username'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['mobile'];?></td>
                <td><?php echo $rows['select_value'];?></td>
			
            </tr>
            <?php
                }
            ?>
        </table>
		</section>
</body>
</html>