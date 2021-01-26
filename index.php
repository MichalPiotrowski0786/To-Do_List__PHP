<?php include "database.php"; ?>

<?php
    $query = "SELECT * from events";
    $eventy = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="zawartosc">
        <header>
            <h1 id='naglowek'>To-Do List</h1>
        </header>
        <div id="eventy">
            <ul>
                <?php while($wiersz = mysqli_fetch_assoc($eventy)): ?>

                    <?php if(1 == $wiersz["isDone"]): ?>
                    <li class='event done'>
                    <?php elseif(0 == $wiersz["isDone"]): ?>
                    <li class='event notdone'>
                    <?php else: ?>
                    <li class='event'>
                    <?php endif ?>

                    <div class='tekst'><?php echo $wiersz["zadanie"]?></div>
                    <form action="delete.php" method="post">
                            <input type='hidden' value="<?php echo trim($wiersz["id"]); ?>" name='hiddenDelete' id='hiddenDelete'>  
                            <input type='submit' value="Usuń" name='delete' id='btn1'>            
                        </form>
                    <form action="edit.php" method="post">
                            <input type='hidden' value="<?php echo trim($wiersz["isDone"]); ?>" name='hiddenEdit' id='hiddenEdit'>
                            <input type='hidden' value="<?php echo trim($wiersz["id"]); ?>" name='hiddenId' id='hiddenId'> 
                            <input type='submit' value="Zmień status" name='edit' id='btnEdit'>            
                        </form>
                    </li>
                <?php endwhile;?>
            </ul>
        </div>

        <div id="formularz">
            <form action="create.php" method="post">
                <input type='text' placeholder='Wpisz swój tekst: ' name='zadanie' id='zadanie'>
                <p><input type='checkbox' name='check' id='check'>
                <label for="check">Zadanie ukończone?</label></p>
                <input type='submit' value='Dodaj' name='create' id='btn0'>               
            </form>
        </div>

    </div>
</body>
</html>