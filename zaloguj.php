<?php
    
    session_start();
     
    if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
    {

        header('Location: zalogujsie.html');
        exit();
    }

    require_once "connect.php"; 

    $lacznosc = @new mysqli($host, $db_user, $db_password, $db_name);

    if($lacznosc->connect_errno!=0)
    {
        echo "Error: ". $lacznosc->connect_errno;

    }
    else
    {

        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        $sql="SELECT * FROM users WHERE login='$login' AND haslo='$haslo'";

        if($zapytanie = @$lacznosc->query($sql))
        {
            $ilosc_uzytkownikow = $zapytanie->num_rows;
            if($ilosc_uzytkownikow>0)
            {
                $_SESSION['zalogowany'] = true;

                $wiersz = $zapytanie->fetch_assoc();
                $_SESSION['id'] = $wiersz['id'];
                $_SESSION['login'] = $wiersz['login'];
                $_SESSION['email'] = $wiersz['email'];
                 
                unset($_SESSION['blad']);
                $zapytanie->free_result();
                header('Location: index.html');
            }
            else
            {
                //header('Location:zalogujsie.html');
                echo "<script type='text/javascript'>alert('Nieprawidłowy login lub hasło');</script>";
            
            }

        }

        $lacznosc->close();
    }
    
     
?>