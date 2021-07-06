<?php
    session_start();
    include("includes/dbcon.php");

    if(isset($_POST["submit"]))
    {
        if(isset($_POST["name"]) AND !empty($_POST["name"]))
        {
            $name = htmlspecialchars($_POST["name"]);
            if(isset($_POST["qty"]) AND !empty($_POST["qty"]) AND $_POST["qty"])
            {
                $qty = htmlspecialchars($_POST['qty']);
                if(isset($_POST["sell"]) AND !empty($_POST["sell"]) AND $_POST["sell"]>0)
                {
                    $sell = htmlspecialchars($_POST["sell"]);
                    if(isset($_POST["buy"]) AND !empty($_POST["buy"]) AND $_POST["buy"]>0)
                    {
                        $buy = htmlspecialchars($_POST["buy"]);
                        if(isset($_POST["category"]) AND !empty($_POST["category"]))
                        {
                            $category = $_POST["category"];
                            $req = $conn->prepare("SELECT * FROM products WHERE names=?");
                            $req->execute(array($name));
                            if($req->fetch())
                            {
                                $req = $conn->prepare("UPDATE products SET names=:nom, quantity=:qty, buy_price=:buy, sale_price=:sale, categorie_id=:cat WHERE id=:id");
                                $req->execute([
                                    "nom" => $name,
                                                    "qty" => $qty,
                                                    "buy" => $buy,
                                                    "sale" =>$sell,
                                                    "cat" => $category,
                                                    "id"=>$_POST["id"]
                                ]);
                                header("Location: manageProducts.php?message=success");
                            }
                            else
                            {
                                header("Location: addProducts.php?message=Product does not exist ");
                            }

                        }
                        else
                        {
                            header("Location: addProducts.php?message=Check well your inputs");
                        }

                    }
                    else
                    {
                        header("Location: addProducts.php?message=Price can not be less than zero");
                    }

                }
                else
                {
                    header("Location: addProducts.php?message=Price can not be less than zero");
                }
            }
            else
            {
                header("Location: addProducts.php?message=Check well your inputs");
            }

        }
        else
        {
            header("Location: addProducts.php?message=Quantity can not be less than zero");
        }
    }
    else if(isset($_POST["submit1"]))
    {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');
        
        if(in_array($fileActualExt, $allowed))
        {
            if($fileError === 0)
            {
                if($fileSize < 1000000000)
                {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $req = $conn->prepare("UPDATE products SET images=:img WHERE id=:id");
                    $req->execute([
                        "img"=>$fileDestination,
                        "id"=>$_POST['id']
                                        
                    ]);
                    


                    header("Location: manageProducts.php?message=success");
                    
                }
                else
                {
                    header("Location: addProducts.php?message=Check well your image");
                }
            }
            else
            {
                header("Location: addProducts.php?message=Check well your image");
            }
    
        }
        else
        {
            header("Location: addProducts.php?message=Check well your image");
        }
   

    }
?>