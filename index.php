<html>
    
    <head>
        <title>SQL PRODUCTS</title>
        
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
        
        <?php
        // sql to create table
        $sql = "CREATE TABLE PRODUCTS (
        ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        NAME VARCHAR(30) NOT NULL,
        UNIT_PRICE DECIMAL(4,2) NOT NULL,
        CATEGORY_ID INT(5)
        )";

        //$sql = "DROP TABLE PRODUCTS"; <--- USE IF THINGS GO WRONG
        $sql = "UPDATE PRODUCTS SET UNIT_PRICE = 20.00 WHERE ID = 1";
        $sql = "ALTER TABLE PRODUCTS ADD IMG_URL VARCHAR(60)";


        if ($conn->query($sql) === TRUE) {
            echo "<br> Table created successfully";
        } else {
            echo "<br> Error creating table: " . $conn->error;
        }

        $sql = "LOAD DATA LOCAL INFILE 'data/products.csv' INTO TABLE `PRODUCTS` FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\\r\\n' IGNORE 1 LINES (`ID` , `NAME`, `UNIT_PRICE`, `CATEGORY_ID`, `IMG_URL`)";

        if ($conn->query($sql) === TRUE) {
            echo "<br> Data Loaded";
        } else {
            echo "<br> Data not loaded <br><hr />" . $conn->error;
        }

        ?>

        <br>     
        <table border="1">
        <?php
        $sql = "SELECT * FROM PRODUCTS";

        



        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>PRODUCT ID: ".$row["ID"]. "</td> <td> NAME: " . $row["NAME"]."</td> <td> UNIT PRICE: " . $row["UNIT_PRICE"]. "</td><td> CATEGORY: " . $row["CATEGORY_ID"]. "</td><td> IMAGE URL: " .$row["IMG_URL"] . "</td>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();

        ?>

        </table>
    </body>
</html>