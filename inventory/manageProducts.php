<!doctype html>
<html>
    <head>
        <?php
            session_start();
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
            <div class="col border">
                <nav class="navbar navbar-expand-lg navbar-light bg-light mb-0 ">
                    <div class="mr-auto">
                        <a href="addProducts.php"><button class="btn btn-primary">+ Add Product</button></a>
                    </div>
                    <div>
                        <form action="">
                            <div class="form-group">
                                <input type="text">
                            </div>
                        </form>
                    </div>
                    
                </nav>

               
                    <table class="table mt-0 border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Picture</th>
                                <th>Product title</th>
                                <th>categories </th>
                                <th>In-Stock</th>
                                <th>Buying Price</th>
                                <th>Selling Price</th>
                                <th>Added date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count = 0;
                                $req = $conn->query("SELECT * FROM products");
                                while($search = $req->fetch())
                                {
                                    $rep = $conn->prepare("SELECT * FROM categories WHERE id=?");
                                    $rep->execute(array($search["categorie_id"]));
                                    while($find = $rep->fetch()){
                                        $count = $count + 1;
                                    ?>
                                    <tr>
                                        
                                        <th><?php echo $count; ?></th>
                                        <th><img style="width: 50px; " src="<?php echo $search["images"]; ?>" alt=""></th>
                                        <th><?php echo $search["names"]; ?></th>
                                        <th><?php echo $find["names"]; ?></th>
                                        <th><?php echo $search["quantity"]; ?></th>
                                        <th><?php echo $search["buy_price"]; ?></th>
                                        <th><?php echo $search["sale_price"]; ?></th>
                                        <th><?php echo $search["dates"] ; ?></th>
                                
                                        <th>
                                            <a href="productUpdate.php?action=1'&id=<?php echo $search['id']; ?>&name=<?php echo $search["names"]; ?>"><button class="btn btn-success m-1"><i class="fas fa-edit"></i></button></a>
                                            <a href="manageProducts.php?action=2&id=<?php echo $search['id']; ?>&name=<?php echo $search["names"]; ?>"><button class="btn btn-danger m-1"><i class="fas fa-trash-alt"></i></button></a>
                                        </th>
                                    </tr>
                                    <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    

                            

            </div>
            
        </div>
        <?php
        if(isset($_GET['message']))
        {
            $noms = $_GET['message']; 
            ?>
            <script>
                
                alert("<?php echo $noms?>");
            </script>
            <?php
        }
            if(isset($_GET['action']) AND !empty($_GET['action']))
            {
                ?>
                <script>
                            var noms = "<?php echo $_GET["name"]; ?>";
                            document.getElementById("addCat").value = noms;
                        </script>
                    <?php

                    
                    if($_GET['action'] == 2)
                    {
                        $cId = $_GET["id"];
                        $names = $_GET['name'];
                        ?> 
                        
                        <script>
        
                            var check = confirm("Confirm Delete of <?php echo $names ?>");
                            if(check)
                            {
                                document.location= "productDelete.php?id=<?php echo $cId ; ?>&name=<?php echo $names; ?>";
                            }
                            else
                            {
                                document.location = "categories.php"
                            }
                            
                            
                        </script>
                        <?php
                    }
        
            }
        ?>


        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'>$(document).ready(function(){
        $("#sidebarCollapse").on('click', function(){
        $("#sidebar").toggleClass('active');
        });
        });</script>
        </body>
    </html>