<html>

<head>
    <title>View Records</title>
    <meta charset="UTF-8">
    <meta name="description" content="View Records">
    <meta name="keywords" content="Teams, Sports, NBA">
    <meta name="author" content="Gamy Burgos">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>



<body>
    <?php
    // starting with the connection
    include('connect-db.php');

    // making a connection to the database and making a query
    if ($result = $conn->query('SELECT * FROM players ORDER BY id')) {
        // checking if the rows are larger than 0
        if ($result->num_rows > 0) {
            echo "<table border='1' cellpadding='10'>";
            echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th></th><th></th></tr>";
            // this will set the loop for every player 
            while($row = $result ->fetch_object()){
                echo "<tr>";
                echo "<td>" . $row->id ."</td>";
                echo "<td>" . $row->firstname ."</td>";
                echo "<td>" . $row->lastname ."</td>";
                //  adding the edit and delete links
                
                echo "<td><a href='records.php?id=" . $row->id . "'</a>Edit</td>";
                echo "<td><a href='delete.php?id=" . $row->id . "'</a>Delete</td>";
         
                echo"</tr>";
            }
            echo "</table>";

            // if not, this will display
        } else {
            echo "No results to display.";
        }


        // if it did not work then we would run the error
    } else {
        echo "Error :" . $conn->error;
    }
    $conn->close();

    ?>


<!-- making a link to add the records -->
<a href="records.php">Add New Record</a>
</body>




</html>