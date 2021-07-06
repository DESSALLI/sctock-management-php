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
            <div class="col border">
                <nav class="navbar navbar-expand-lg navbar-light bg-light mb-0">
                    <div class="mr-auto">
                        
                    
                        <button class="btn btn-primary">+ Add Sales</button>
                    </div>
                    <div>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control">
                            </div>
                        </form>
                        
                    </div>
                    
                </nav>
               
                    <table class="table mt-0 border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
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