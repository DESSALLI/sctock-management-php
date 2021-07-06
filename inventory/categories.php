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
            
            <div class="container">
                <div class="row ">
                    <div class="col-md-5 mr-auto ml-auto border p-3">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-0">
                            <div class="mr-auto">
                            <i class="fas fa-th"></i>
                                <a class="navbar-brand" href="#">Add categories</a>
                            </div>
                            
                            
                        
                        </nav>

                        <form action="" method="POST" class="m-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="addCat" name="cat">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">add categories</button>
                            </form>
                    </div>


                    <div class="col-md-5 ml-auto mr-auto border">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-0 pt-2">
                    <div class="mr-auto ">
                    <i class="fas fa-th"></i>
                        <a class="navbar-brand" href="#">All categories</a>

                    </div>
                    
                    
                </nav>
                <div class="mt-0 pt-2">
                    <table class="table table-bordered mt-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $req = $conn->query("SELECT * FROM categories");
                                while($search = $req->fetch())
                                {
                                    ?>
                                    <tr>
                                        <th><?php echo $search["id"]; ?></th>
                                        <th><?php echo $search["names"]; ?></th>
                                       
                                        <th>
                                            <a href="categories.php?action=1'&id=<?php echo $search['id']; ?>&name=<?php echo $search["names"]; ?>"><button class="btn btn-success m-1"><i class="fas fa-edit"></i></button></a>
                                            <a href="categories.php?action=2&id=<?php echo $search['id']; ?>&name=<?php echo $search["names"]; ?>"><button class="btn btn-danger m-1"><i class="fas fa-trash-alt"></i></button></a>
                                        </th>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
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
                        document.location= "categoryDelete.php?id=<?php echo $cId ; ?>&name=<?php echo $names; ?>";
                    }
                    else
                    {
                        document.location = "categories.php"
                    }
                    
                    
                </script>
                <?php
            }

    }
    if(isset($_POST["submit"]))
    {
        if(isset($_GET['action']) AND !empty($_GET['action']))
        {
            if($_GET["action"] == 1)
            {
                $cId = $_GET["id"];
                $names = htmlspecialchars($_POST["cat"]);

                ?> 
                
                <script>

                    var check = confirm("Confirm update of <?php echo $_GET["name"];?> to <?php echo $names; ?>");
                    if(check)
                    {
                        document.location= "categoryUpdate.php?id=<?php echo $cId ; ?>&name=<?php echo $names; ?>";
                    }
                    else
                    {
                        document.location = "categories.php"
                    }
                    
                    
                </script>
                <?php

                
                

            }
            else
            {
                header("Location: categories.php");
            }
        }
        else
        {
            if(empty($_POST["cat"]))
            {
                ?>
                <script> alert("fill in the blanks") </script>
                <?php
            }
            else
            {
                $name= htmlspecialchars($_POST['cat']);

                $req = $conn->prepare("SELECT * FROM categories WHERE names=?");
                $req->execute(array($name));
                $find = $req->fetch();
                if($find)
                {
                    ?>
                    <script> alert("Categories already exist")</script>
                    <?php
                }
                else
                {
                    $req = $conn->prepare("INSERT INTO categories (names) VALUES(:nom)");
                    $req->execute(array(
                        "nom" => $name
                    ));

                    header("Location: categories.php");
                }
                
            }
        }
        

    }
    ?>