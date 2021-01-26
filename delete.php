<?php include "database.php";

if (isset($_POST["delete"])) {
    $id = trim($_POST["hiddenDelete"]);

    if(empty($id)){
        header("location: index.php");
        exit();
    }else{
        $query = "DELETE FROM events WHERE id='$id'";
    }
    
    if (!mysqli_query($con, $query)) {
        die("Błąd: ".mysqli_error($con));
    } else {
        header("Location: index.php");
        exit();
    }
}

?>