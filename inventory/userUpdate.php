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
                <div class="row">
                    <div class="col-md-5 border p-2 m-2">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-0">
                            <div class="mr-auto">
                            <i class="fas fa-user"></i>
                                <a class="navbar-brand" href="#">Update user</a>
                            </div>
                        </nav>

                        <form action="userUpdateValidation.php" method="POST" class="m-2">
                            <?php
                                if(isset($_GET["id"]) AND !empty($_GET["id"])){

                                
                                    $req = $conn->prepare("SELECT * FROM users WHERE id=?");
                                    $req->execute(array($_GET["id"]));
                                    while($search = $req->fetch())
                                    {
                                        if($search['statu'] == 1)
                                        {
                                            $status = "Presently active";
                                        }
                                        else
                                        {
                                            $status ="presently deactive";
                                        }

                                        if($search['userLevel'] == 1)
                                        {
                                            $stats = "Presently admin";
                                        }
                                        else
                                        {
                                            $stats ="presently user";
                                        }

                                ?>    
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="id" value="<?php echo $_GET['id']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">name</label>
                                    <input type="text" class="form-control" value="<?php echo $search['names'] ; ?>"  name="names" placeholder="full name">
                                </div>
                                <div class="form-group">
                                    <label for="">role</label>
                                    <select name="userLevel" class="form-control" id="">
                                        <option value="<?php echo $search['userLevel'] ; ?>"><?php echo $stats; ?></option>
                                        <option value="2">change to User</option>
                                        <option value="1">change to Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control" id="">
                                        <option value="<?php echo $search['statu'] ; ?>"><?php echo $status ; ?></option>
                                        <option value="">change to Active</option>
                                        <option value="">change to Deactive</option>
                                    </select>
                                </div>
                                <?php
                                    }
                                }
                                ?>
                                <button type="submit" name="submit2" class="btn btn-primary">Update</button>
                            </form>
                    </div>


                    
                    <div class="col-md-5 border p-2 m-2">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-0 pt-2">
                            <div class="mr-auto ">
                            <i class="fas fa-lock"></i>
                                <a class="navbar-brand" href="#">Update password</a>

                            </div>
                            
                        </nav>
                        <form action="userUpdateValidation.php" method="POST" class="m-2">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="id" value="<?php echo $_GET['id']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control"  name="psw" placeholder="change password">
                                </div>
                                <button type="submit" name="submit1" class="btn btn-danger">change</button>
                            </form>
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