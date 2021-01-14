<html>
    
    <head>
        <title>SQL Data</title>
        
<?php
$servername = "servername.com";
$username = "username";
$password = "password";
$dbname = "dbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
        
        
        
    </head>
    
    
    <body>
        
        <br>     
<table border="1">
<?php
$sqlinsert1 = "INSERT INTO user_details VALUES(300, 'hello', 'Steph', 'Curry', 'Female', 'password', 1)";
$sqlinsert = "INSERT INTO user_details VALUES(696, 'mrbean', 'Ronald', 'McDonald', 'Mmale', 'nopasswordplz', 1)";
$sqldelete = "DELETE FROM user_details WHERE user_id=25";
$sqlupdate1 = "UPDATE user_details SET last_name= 'smithyboiii' WHERE user_id= 4";
$sqlupdate = "UPDATE user_details SET first_name= 'boise' WHERE user_id= 69";


$sql = "SELECT * FROM user_details";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>ID: " . $row["user_id"]. "</td> <td> First Name: " . $row["first_name"]. "</td><td> Last Name: " . $row["last_name"]. "</td><td> Gender: " . $row["gender"] . "</td><td> User Name: " . $row["username"] . "</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
        
</table>       
        
        
        
        
        
    </body>
    
    
    
    
    
</html>