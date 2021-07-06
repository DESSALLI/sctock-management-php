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
                if(isset($_GET["id"]) AND !empty($_GET["id"]))
            {
                $req = $conn->prepare("SELECT * FROM products WHERE id=?");
                $req->execute(array($_GET["id"]));
                while($look = $req->fetch())
                {
                    $buy = $look["buy_price"];
                    $sale =$look["sale_price"];
                    $name = $look['names'];
                    $quantity = $look["quantity"];
                    $category = $look["categorie_id"];
                    $image = $look["images"];
                }

            }
            else
            {
                header("Location: manageProducts.php?message=error");
            }
            ?>

            <div class="m-md-5 border p-2"> 
                <nav class="navbar navbar-expand-lg navbar-light bg-light mb-1  ">
                            <div class="mr-auto">
                            <i class="fas fa-th"></i>
                                <a class="navbar-brand" href="#">Update product</a>
                            </div>
                            
                            
                        
                </nav>
                <form action="productUpdateValidation.php" method="POST" enctype="multipart/form-data" class="needs-validation border m-3 border-shadow p-2" novalidate>
                        <div class="col-md-6 mb-3">
                            <label for="">Select product image</label>
                            <input type="file" name="file"  class="form-control" id="validationCustom03"  required>
                            
                            <input type="text" style="display: none;" readonly class="w-2" name="id" class="form-control" id="validationCustomUsername" value="<?php echo $_GET['id'];?>" aria-describedby="inputGroupPrepend" required>
                        
                            
                            </div>
                            <button class="btn btn-danger" name="submit1" type="submit">Update image</button>
                    </form>


                <form action="productUpdateValidation.php" method="POST" enctype="multipart/form-data" class="needs-validation border border-shadow p-2" novalidate>
                    <div class="form-row">
                        <div class="col-md mb-3">
                            <label for="">Product name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-th-large"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control" id="validationCustomUsername" value="<?php echo $name; ?>" aria-describedby="inputGroupPrepend" required>
                            
                            <input type="text" style="display: none;" readonly class="w-2" name="id" class="form-control" id="validationCustomUsername" value="<?php echo $_GET['id'];?>" aria-describedby="inputGroupPrepend" required>
                        
                        </div>
                        </div>
                    </div>

                    <div class="form-row">
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Select a category</label>
                        <select name="category" id="inputState" class="form-control">
                            
                            <?php

                                $req = $conn->query("SELECT * FROM categories");
                                while($find = $req->fetch())
                                {
                                    if($category == $find["id"])
                                    {
                                        $cam = $find["names"];
                                    }

                                
                            ?>
                        <option value="<?php echo $find["id"]; ?>"><?php echo $find['names']; ?></option>
                        
                                    <?php
                                }
                                    ?>
                                    <option selected value="<?php echo $category; ?>"><?php echo $cam;?></option>
                        </select>
                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                        <label for="">Product qty</label>
                        <div class="form-row">
                            
                        <div class="col-md mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-shopping-cart"></i></span>
                            </div>
                            <input type="number" value="<?php echo $quantity; ?>" name="qty" class="form-control" id="validationCustomUsername" placeholder="Product quantity" aria-describedby="inputGroupPrepend" required>
                            
                        </div>
                        </div>
                    </div>
                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="">Buying price</label>
                        <div class="form-row">
                            
                        <div class="col-md mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input type="number" value="<?php echo $buy;?>" name="buy" class="form-control"id="validationCustomUsername" placeholder="Buying price" aria-describedby="inputGroupPrepend" required>
                            <span class="input-group-text" id="inputGroupPrepend">.00</span>
                            
                        </div>
                        </div>
                    </div>
                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="">Selling price</label>
                        <div class="form-row">
                        <div class="col-md mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input type="number" value="<?php echo $sale; ?>" name="sell" class="form-control" id="validationCustomUsername" placeholder="Selling price" aria-describedby="inputGroupPrepend" required>
                            <span class="input-group-text" id="inputGroupPrepend">.00</span>
                            
                        </div>
                        </div>
                    </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary" name="submit" type="submit2">Submit form</button>
                    </form>

                    
                    <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                        });
                    }, false);
                    })();
                    </script>

                        
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
        ?>

        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'>$(document).ready(function(){
        $("#sidebarCollapse").on('click', function(){
        $("#sidebar").toggleClass('active');
        });
        });</script>
        </body>
    </html>