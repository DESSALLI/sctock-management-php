<?php
    session_start();
    
    include("includes/dbcon.php");

    if(isset($_POST["submit"]))
    {
        $psw = htmlspecialchars($_POST["psw"]);
        $cpsw = htmlspecialchars($_POST["cpsw"]);
        $email = htmlspecialchars($_POST["email"]);

        if(empty($email) OR empty($psw) OR empty($cpsw))
        {
            header("Location: addUsers.php?error=1&mail=$email&message='fill the blanks'");
        }

        $lpsw = strlen($psw);
        if($lpsw<4)
        {
            header("Location: addUsers.php?error=1&mail=$email&message='password too short'");
        }
        else
        {
            if($psw == $cpsw)
            {
                $req = $conn->prepare("SELECT * FROM users WHERE email=?");
                $req->execute(array($email));
                $find = $req->fetch();
                if($find)
                {
                    header("Location: addUsers.php?error=1&mail=$email&message='User already exists'");
                }
                else
                {
                    $req = $conn->prepare("INSERT INTO users (email, psw) VALUES(:mail, :pass)");
                    $req->execute(array(
                        "mail" => $email,
                        "pass" => $psw
                    ));
                    header("Location: addUsers.php?error=1&mail=$email&message='Sucess'");

                }
                
            }
            else
            {
                header("Location: addUsers.php?error=1&mail=$email&message='Passwords does not match'");
            }
        }

    }
    else
    {
        header("Location: addUsers.php?error=1&mail=$email&message='Sorry an error has occur'");
    }



$conn = null;
?>
