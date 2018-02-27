<?php
 
    session_start();
     
    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: zalogujsie.html');
        exit();
    }
     
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    
</head>
 
<body>
     
<?php
 
    echo "<p>Witaj ".$_SESSION['login'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
     
    echo "<p><b>Email</b>: ".$_SESSION['email'];




     
?>
 
</body>
</html>