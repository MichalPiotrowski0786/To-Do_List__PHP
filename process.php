<?php include "database.php";

if (isset($_POST["button"])) {
    $txt = mysqli_real_escape_string($con, $_POST["txt"]);
    $isDone = 0;

    if(isset($_POST["check"])){
        $isDone = 1;
    }else{
        $isDone = 0;
    }

    //walidacja danych
    if (!isset($txt) || empty($txt) || $txt = "") {
        $error = "NieWprowadziłeśPoprawnegoTekstu";
        header("Location: index.php?error=".urlencode($error));
        exit(); 
    } else {
        $query = "INSERT INTO events (txt, isDone) VALUES('$txt','$isDone')";
        if (!mysqli_query($con, $query)) {
            die("Błąd: ".mysqli_error($con));
        } else {
            header("Location: index.php");
            exit();
        }
    }
}

?>
