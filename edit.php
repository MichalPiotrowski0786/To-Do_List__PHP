<?php include "database.php";

if (isset($_POST["edit"])) {
    $id = trim($_POST["hiddenId"]);
    $isDone = $_POST["hiddenEdit"];

    if(!isset($isDone) || !isset($id)){
        header("location: index.php?error=".urldecode($php_errormsg));
        exit();
    }else{
        if(1 == $isDone)
        {
            $query = "UPDATE events SET isDone='0' WHERE id='$id'";
        }else if(0 == $isDone)
        {
            $query = "UPDATE events SET isDone='1' WHERE id='$id'";
        }else{
            exit();
        }
    }
    
    if (!mysqli_query($con, $query)) {
        die("Błąd: ".mysqli_error($con));
    } else {
        header("Location: index.php");
        exit();
    }
}

?>