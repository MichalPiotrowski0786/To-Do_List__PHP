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

                    <span class='tekst'><?php echo $wiersz["txt"]?></span>
                    
                <?php endwhile;?>
            </ul>
        </div>

        <div id="formularz">
            <form action="process.php" method="post">
                <div id="srodek">
                <p><input type='text' placeholder='Wpisz swój tekst: ' name='txt' id='txt'></p>
                <p><input type='checkbox' name='check' id='check'>
                <label for="check">Zadanie ukończone?</label></p>
                <input type='submit' value='Dodaj' name='button' id='button'>   
                </div>             
            </form>
        </div>
    </div>
</body>
</html>