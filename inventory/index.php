<?php
    session_start();

    include('includes/dbcon.php');
    $email = $_SESSION["email"];

    $sql = $conn->prepare("SELECT * FROM users where email=?");
    $sql->execute(array($email));
    $find = $sql->fetch();

    while($search = $find)
        {
            $confirm_psw = $search["psw"];
            $user_level = $search["userLevel"];
            $image_path = $search["image"];
            break;
            
        }
    
        $req = $conn->query("SELECT * FROM users");
        $countUsers = 0;
        while ($count = $req->fetch()) 
        {
          $countUsers = $countUsers + 1;
        }

        $req = $conn->query("SELECT * FROM products");
        $countProducts = 0;
        while ($count = $req->fetch()) 
        {
          $countProducts = $countProducts + 1;
        }

        $req = $conn->query("SELECT * FROM categories");
        $countCategories = 0;
        while ($count = $req->fetch()) 
        {
         $countCategories =$countCategories + 1;
        }

        $req = $conn->query("SELECT * FROM sales");
        $countSales = 0;
        while ($count = $req->fetch()) 
        {
          $countSales = $countSales + 1;
        }
      



    
?>

<!doctype html>


<html>
    <head>
        <?php
            include('includes/head.php ');
        ?>

        

        <title>touldnfkn</title>
    </head>
    <body oncontextmenu='return false' class='snippet-body'>
        <div class="wrapper">
            <?php
                include('includes/sidebar.php ');
            ?>
            <div class="content-wrapper">
                <div>
                <p><Span>Dashbord</Span> > </p>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 smb  ">
                            <div class="bg-success smb-icon text-center">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="smb-text text-center">
                                <h5><?php echo $countUsers; ?></h5>
                                <p>Users</p>
                            </div>
                        </div>
                        <div class="col-md-3 smb">
                            <div class="bg-primary smb-icon">
                                <i class="fas fa-th-large"></i>
                            </div>
                            <div class="smb-text">
                                <h5><?php echo $countProducts; ?></h5>
                                <p>Products</p>
                            </div>
                        </div>
                        <div class="col-md-3 smb">
                            <div class="bg-secondary smb-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="smb-text">
                                <h5><?php echo $countCategories; ?></h5>
                                <p>Categories</p>
                            </div>
                        </div>
                        <div class="col-md-3 smb">
                            <div class="bg-danger smb-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="smb-text">
                                <h5><?php echo $countSales; ?></h5>
                                <p>Sales</p>
                            </div>
                        </div>
                    </div>
        
        
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-4">
                                <p> HIGHEST SELLING PRODUCTS</p> 
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th >Name</th>
                                        <th >Total sold</th>
                                        <th >Total quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $req = $conn->query("SELECT * FROM sales ORDER BY id desc");
                                            while($find = $req->fetch() )
                                            {
                                                $productId = $find["product_id"];

                                                
                                            
                                            }
                                        ?>
                                    </tbody>  
                                </table>
                            </div>
                            <div class="col-md-4">
                                <p>  LATEST SALES</p>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th >Product name</th>
                                        <th >Date</th>
                                        <th >Total sale</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            
                                            $req = $conn->query("SELECT * FROM sales ORDER BY id desc");
                                            while($find = $req->fetch() )
                                            {
                                                $productId = $find["product_id"];

                                                $ed =$conn->prepare("SELECT * FROM products WHERE id=?");
                                                $ed->execute(array($productId));
                                                while($pf = $ed->fetch())
                                                {
                                                ?>
                                                <tr>
                                                    <th><a class="text-primary" href="#"><?php echo $pf["names"]; ?></a></th>
                                                    <th><?php echo $find["date"]; ?></th>
                                                    <th><?php echo $find["price"]; ?> Frs</th>
                                                </tr>
                                                <?php
                                                }
                                            }
                                        ?>
                                    </tbody>   
                                </table>
                            </div>
                            <div class="col-md-4 border" >
                                <p> RECENTLY ADDED PRODUCTS</p>
                                <div class="col border bg-secondary">
                                    
                                    <div class="row pl-3">
                                        <h5>image</h5>
                                        <h5>item update</h5>
                                    </div>
                                    <div class="row pl-3">
                                        <h5>quantiy</h5>
                                        <h5>selling price</h5>
                                    </div>


                                </div>
                            </div>
        
                        </div>
                    </div>
        
                </div>
            </div>
        </div>



        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'>$(document).ready(function(){
        $("#sidebarCollapse").on('click', function(){
        $("#sidebar").toggleClass('active');
        });
        });</script>
        </body>
    </html>

    <?php 
        $conn = null;
    ?>