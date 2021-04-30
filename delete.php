<?php

include('connect-db.php');



// checking for the id land makking sure that it is numeric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {


    $id = $_GET['id'];
// this would be our prepared statement to get the player with that id
    if( $stmt = $conn->prepare("DELETE FROM players WHERE id = ? LIMIT 1")){
// this is binding the id, the "i" is for and integer and multiple paramaters can be in a prepared statement
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }else {
        echo "ERROR: Could not prepare SQL Statements.";
    }

    
    $conn->close();


    header("Location: view.php");
} else {
    header("Location: view.php");
}
?>