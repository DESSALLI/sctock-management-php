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
                <nav class="navbar navbar-expand-lg navbar-light bg-light mb-0">
                    <div class="mr-auto">
                        
                    
                    <a href="addUsers.php"><button class="btn btn-primary">+ Add Users</button></a>
                    </div>
                    <div>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control">
                            </div>
                        </form>
                        
                    </div>
                    
                </nav>
               
                    <table class="table mt-0 border text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                
                                <th>Status </th>
                                <th>Last Login</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                                $req = $conn->query("SELECT * FROM users");
                                while($search = $req->fetch())
                                {
                                    ?>
                                    <tr>
                                        <th><?php echo $search["id"]; ?></th>
                                        <th><?php echo $search["names"]; ?></th>
                                       
                                        
                                        <?php
                                            if($search["statu"] == 1)
                                            {
                                                echo "<th ><button class='btn btn-success ' > Active</button></th>";
                                            }
                                            else if($search["statu"] == 0)
                                            {
                                                echo "<th><button class='btn btn-danger' > Deactive</button></th>";
                                            }
                                        ?>
                                        <th>to be done</th>
                                        <th>
                                            <a href="userUpdate.php?action=1'&id=<?php echo $search['id']; ?>&name=<?php echo $search['names']; ?>"><button class="btn btn-success m-1"><i class="fas fa-edit"></i></button></a>
                                            <a href="user.php?action=2&id=<?php echo $search['id']; ?>&name=<?php echo $search['names']; ?>"><button class="btn btn-danger m-1"><i class="fas fa-trash-alt"></i></button></a>
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



        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'>$(document).ready(function(){
        $("#sidebarCollapse").on('click', function(){
        $("#sidebar").toggleClass('active');
        });
        });</script>
        </body>
    </html>

    <?php
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
                        document.location= "userDelete.php?id=<?php echo $cId ; ?>&name=<?php echo $names; ?>";
                    }
                    else
                    {
                        document.location = "user.php"
                    }
                    
                    
                </script>
                <?php
            }


    }
    ?>