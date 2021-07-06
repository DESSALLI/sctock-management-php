<?php
    session_start();
    include("includes/dbcon.php");

    if(isset($_POST["submit2"]))
    {
        

        if(isset($_POST["names"]) AND !empty($_POST["names"]))
        {
            $name = htmlspecialchars($_POST["names"]);
            if(isset($_POST["userLevel"]) AND !empty($_POST["userLevel"]))
            {
                $level = htmlspecialchars($_POST["userLevel"]);
                if(isset($_POST["status"]) AND !empty($_POST["status"]))
                {
                    $status = htmlspecialchars($_POST["status"]);
                    if(isset($_POST["id"]) AND !empty($_POST["id"]))
                    {
                        $id = htmlspecialchars($_POST["status"]);
                        $req = $conn->prepare("UPDATE users SET names=:nom, statu=:statu, userLevel=:lev WHERE id=:id");
                        $req->execute([
                            "nom" => $name,
                            "statu"=> $status,
                            "lev"=>$level,
                            "id" => $id
                        ]);

                        header("Location: user.php?message='Sucess'");
                    }
                    else
                    {
                        header("Location: user.php?message='Check your informations 4");
                    }

                }
                else
                {
                    header("Location: user.php?message='Check your informations 3");
                    
                }

            }
            else
            {
                header("Location: user.php?message='Check your informations 2");

            }

        }
        else
        {
            header("Location: user.php?message='Check your informations 1");

        }
        

    }
    else if(isset($_POST["submit1"]))
    {
        if(isset($_POST["psw"]) AND !empty($_POST["psw"]))
        {
            $psw = htmlspecialchars($_POST["psw"]);
            if(isset($_POST["id"]) AND !empty($_POST["id"]))
            {
                $id = htmlspecialchars($_POST["id"]);
                $req = $conn->prepare("UPDATE users SET psw=:psw WHERE id=:id");
                $req->execute([
                    "psw"=>$psw,
                    "id" => $id
                ]);
            }
            else
            {
                header("Location: user.php?message='Check your informations");
            }
        }   
    }

?>