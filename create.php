<?php include "database.php";

if (isset($_POST["create"])) {
    $zadanie = mysqli_real_escape_string($con,$_POST["zadanie"]);
    $isDone = 0;

    if(isset($_POST["check"])){
        $isDone = 1;
    }else{
        $isDone = 0;
    }

    //walidacja danych
    if (!isset($zadanie) || $zadanie = "") {
        $error = "NieWprowadziłeśPoprawnegoTekstu";
        header("Location: index.php?error=".urlencode($error));
        exit(); 
    } else {
        $query = "INSERT INTO events (isDone, zadanie) VALUES('$isDone','$zadanie')";
        if (!mysqli_query($con, $query)) {
            die("Błąd: ".mysqli_error($con));
        } else {
            header("Location: index.php");
            exit();
        }
    }
}

?>
