<?php
 
    require_once "connect.php"; 

    $lacznosc = @new mysqli($host, $db_user, $db_password, $db_name);

    if($lacznosc->connect_errno!=0)
    {
        echo "Error: ". $lacznosc->connect_errno;

    }
    else
    {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $telefon = $_POST['telefon'];
        $tatuazysta = $_POST['tatuazysta'];
        $data_sesji = $_POST['data'];

        $sql1 = "INSERT INTO `zgloszenia` (`tatuazysta`, `data_sesji`) VALUES ('$tatuazysta','$data_sesji')";
        
        $sql2 = "INSERT INTO `dane_osobowe`(`imie`, `nazwisko`, `numer_telefonu`) VALUES ('$imie', '$nazwisko', '$telefon')";

        //echo  $imie . " " . $nazwisko;
        if(($lacznosc->query($sql1)) & ($lacznosc->query($sql2)))
        {
            echo "Zgłoszenie zostało wysłane!";
            echo ("<br>");
            echo ("<br>");
            echo '<a href="index.html"> Wróć do strony głównej </a> ';
        }
        else{
            echo "Błąd!";
            echo ("<br>");
            echo ("<br>");
            echo '<a href="index.html"> Wróć do strony głównej </a> ';
        }

         

        //$lacznosc->query($sql2);

        //echo "Zgłoszenie zostało wysłane";
        

        /***if($zapytanie = @$lacznosc->query($sql))
        {
            $ilosc_uzytkownikow = $zapytanie->num_rows;
            if($ilosc_uzytkownikow>0)
            {
                $_SESSION['zalogowany'] = true;

                header('Location: home.html');
            }
            else
            {
                echo "Nieprawidłowy login lub hasło";
            }
        }
        ***/

        $lacznosc->close();
    }
    
     
?>