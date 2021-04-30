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
    include('connect-db.php');

    // making a connection to the database and making a query
    if ($result = $conn->query('SELECT * FROM players ORDER BY id')) {
        // checking if the rows are larger than 0
        if ($result->num_rows > 0) {


            echo "<table border='1' cellpadding='10'>";
            echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th></tr>";

            while($row = $result ->fetch_object()){
                echo "<tr>";
                echo "<td>" . $row->id ."</td>";
                echo "<td>" . $row->firstname ."</td>";
                echo "<td>" . $row->lastname ."</td>";
                echo"</tr>";
            }
            echo "</table>";
        } else {
            echo "No results to display.";
        }


        // if it did not work then we would run the error
    } else {
        echo "Error :" . $conn->error;
    }
    $conn->close();

    ?>


</body>




</html>