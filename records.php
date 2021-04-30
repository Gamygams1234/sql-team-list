<?php
include('connect-db.php');

function renderForm($first = '', $last = '', $id = '', $error = '')

{ ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php if ($id != "") {
                    echo "Editing";
                } else {
                    echo "Creating";
                }  ?> </title>
    </head>

    <body>
        <h1><?php if ($id != "") {
                echo "Editing";
            } else {
                echo "Creating";
            }  ?></h1>

        <?php if ($error != '') {
            echo "<div>" . $error . "</div>";
        }

        ?>
        <form action="" method="POST">
            <div>
                <?php if ($id != '') { ?>

                    <input type="hidden" name="id" value=<?php echo $id; ?>>

                    <p>ID: <?php echo $id; ?></p>

                <?php } ?>

                <strong>First Name: *</strong><input type="text" name="firstname" value=<?php echo $first; ?>> <br>
                <strong>Last Name: *</strong><input type="text" name="lastname" value=<?php echo $last; ?>>
                <p>* is required</p>
                <input type="submit" name="submit" value="submit">
            </div>



        </form>
    </body>

    </html>

<?php
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
 // edit 
    renderForm(NULL, NULL, $_GET['id'],NULL);
} else {
    // new record
    if (isset($_POST['submit'])){

        $firstname = htmlentities($_POST['firstname'], ENT_QUOTES);
        $lastname = htmlentities($_POST['lastname'], ENT_QUOTES);

        if ($firstname =="" || $lastname == ""){
            $error = "Please fill in everything";
            renderForm($firstname, $lastname, NULL, $error);

        }else{
            if($stmt = $conn->prepare("INSERT  players (firstname, lastname) VALUES (?, ?)")){
                $stmt->bind_param("ss", $firstname, $lastname);
                $stmt->execute();
                $stmt->close();

            }else {
                echo "Could not  prepare";
            }
            header("Location: view.php");
        }

    }else{
      renderForm();   
    }
   
}
$conn->close();

?>