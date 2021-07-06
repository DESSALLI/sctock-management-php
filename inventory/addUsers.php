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

            <div class="m-md-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-1  ">
                            <div class="mr-auto">
                            <i class="fas fa-users"></i>
                                <a class="navbar-brand" href="#">Add User</a>
                            </div>
                            
                            
                        
                </nav>

                <form action="addUserValidation.php" method="POST" class="border p-3 need-validation">
                    <div class="form-row">
                        <div class="col">
                        <label for="">email</label>

                        <div class="form-row">
                            
                        <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="email" class="form-control" id="mail" placeholder="fullname@mail.com" name="email"  required>
                           
                        </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                        <label for="">password</label>

                        <div class="form-row">
                            
                        <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control"  placeholder="***********" name="psw"  required>
                           
                        </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                        <label for="">Confirm password</label>

                        <div class="form-row">
                            
                        <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control"  placeholder="***********" name="cpsw"  required>
                           
                        </div>
                        </div>
                    </div>

                    <button class="btn btn-primary m-3" type="submit" name="submit">ADD</button>
                </form>

            </div>
            
        </div>

        <?php

        if(isset($_GET["mail"]))
        {
            ?>
            <script>
                var mail = "<?php echo $_GET["mail"]; ?>";
                document.getElementById("mail").value = mail;
            </script>
            <?php
        }
        ?>

        <?php
        if(isset($_GET["message"]))
        {
            $msg = $_GET["message"]
            ?>
            <script>
                alert("<?php echo $msg; ?>")
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