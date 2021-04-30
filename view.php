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
    if ( $result = $conn ->query('SELECT * FROM players ORDER BY id')){

        echo "Success";


        // if it did not work then we would run the error
    }else{
        echo "Error :" . $conn->error;
    }
    

    ?>


</body>




</html>