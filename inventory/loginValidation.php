<?php
    session_start();


    $servername = "localhost";
    $username = "root";
    $password = "";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=ecom", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    $email = htmlspecialchars($_POST["email"]);
    $psw = htmlspecialchars($_POST["password"]);
    
    $sql = $conn->prepare("SELECT * FROM users where email=?");
    $sql->execute(array($email));
    $find = $sql->fetch();

    if($find)
    {
        while($search = $find)
        {
            $confirm_psw = $search["psw"];
            $user_level = $search["userLevel"];
            $userName = $search["userName"];
            break;
            
        }
        if($confirm_psw == $psw)
        {
            if($user_level == 1)
            {
                header("Location: index.php");
                $_SESSION["user_level"] = 1;
                $_SESSION["user_name"] = $userName;
                $_SESSION["email"] = $email;
            }
            else if($user_level == 2)
            {
                header("Location: index.php");
                $_SESSION["user_level"] = 2;
                $_SESSION["user_name"] = $userName;
                $_SESSION["email"] = $email;
            }
        }
        else
        {
           header("Location: login.php?Error=2&mail=$email");
        }
        
    }
    else
    {
        header("Location: login.php?Error=1&mail=$email");
    
    }

    $conn = null;


?>