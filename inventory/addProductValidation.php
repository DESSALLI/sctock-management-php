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
                            $req = $conn->prepare("SELECT * FROM products WHERE names=?");
                            $req->execute(array($name));
                            if(!$req->fetch())
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

                                                $category = htmlspecialchars($_POST["category"]);
                                               
                                                $date = date("Y-m-d h:i:sa");
                                                $req = $conn->prepare("INSERT INTO products(names, quantity, buy_price, sale_price, categorie_id, images, dates) 
                                                VALUES(:names, :quantity, :buy_price,:sale,:cat,:img,:dates)");
                                                $req->execute(array(
                                                    "names" => $name,
                                                    "quantity" => $qty,
                                                    "buy_price" => $buy,
                                                    "sale" =>$sell,
                                                    "cat" => $category,
                                                    "img"=>$fileDestination,
                                                    "dates" => $date
                                                ));

                                                header("Location: addProducts.php?message=success");
                                                
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
                            else
                            {
                                header("Location: addProducts.php?message=Product Already exist ");
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
    else
    {
        header("Location: addProducts.php?message=Check well your inputs");

    }
?>