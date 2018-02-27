<?php
 
    require_once "connect.php"; 

    $lacznosc = @new mysqli($host, $db_user, $db_password, $db_name);

    if($lacznosc->connect_errno!=0)
    {
        echo "Error: ". $lacznosc->connect_errno;
        //throw new Exception(mysqli_connect_errno());
    }
    else
    {
        $email = $_POST['email'];
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $haslo2 = $_POST['haslo2'];


 /*       $rezultat = $lacznosc->query("SELECT IDuser FROM users WHERE email='$email'");
                    
                    if(!$rezultat) throw new Exception($lacznosc->error);
                    
                    $ile_takich_maili = $rezultat->num_rows;
                    
                    if($ile_takich_maili>0)
                    {
                    $wszystko_OK=false;
                    $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu mail :/";
                    }

        $rezultat = $lacznosc->query("SELECT IDuser FROM users WHERE login='$login'"); //???
                    
                    if(!$rezultat) throw new Exception($lacznosc->error);
                    
                    $ile_takich_nickow = $rezultat->num_rows;
                    
                    if($ile_takich_nickow>0)
                    {
                    $wszystko_OK=false;
                    $_SESSION['e_login']="Istnieje już gracz o takim nicku :/, wybierz inny";
                    }

        if($wszystko_OK==true)
        {
*/
                $sql1 = "INSERT INTO `users` (`email`, `login`, `haslo`) VALUES ('$email','$login', '$haslo')";
                
               // $sql2 = " SELECT * FROM `users` WHERE login='$login' ";
               // $zapytanie = $lacznosc->query($sql2);

                        if($lacznosc->query($sql1)) 
                        {
                            echo "Konto zostało utworzone!";
                            echo ("<br>");
                            echo ("<br>");
                            echo '<a href="index.html"> Wróć do strony głównej </a> ';
                        }
                        else
                        {
                            echo "Błąd rejestracji!";
                            echo ("<br>");
                            echo ("<br>");
                            echo '<a href="index.html"> Wróć do strony głównej </a> ';
                        }
                $lacznosc->close();
        }
        
     
?>