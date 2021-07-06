<?php
    

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
    

    
?>


<nav id="sidebar">
        <div class="sidebar-header">
            <h3>La company</h3>
            <hr>
        </div>
        <ul class="list-unstyled components">
            <p>MENUS</p>
            <li>
                 <a href="index.php" >Dashboard</a>
            </li>
            <li> 
                <a href="#salSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">User Management</a>
                <ul class="collapse list-unstyled" id="salSubmenu">
                    <li> <a href="user.php">Manage users</a> </li>
                    <li> <a href="addUsers.php">Add users</a> </li>
                </ul>
            </li>
            
            <li>
                <a href="categories.php">Categories</a> 
            </li>
            <li> 
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Products</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li> <a href="manageProducts.php">Manage Produts</a> </li>
                    <li> <a href="addProducts.php">Add products</a> </li>
                </ul>
            </li>
            <li>
                <a href="#"> Media Files</a>
            </li>
            <li> 
                <a href="#salesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Sales</a>
                <ul class="collapse list-unstyled" id="salesSubmenu">
                    <li> <a href="sales.php">Manage Sales</a> </li>
                    <li> <a href="addSales.php">Add Sales</a> </li>
                </ul>
            </li>
            <li> 
                <a href="#salereport" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Sales Report</a>
                <ul class="collapse list-unstyled" id="salereport">
                    <li> <a href="#">Monthly Report</a> </li>
                    <li> <a href="#">Daily Report</a> </li>
                </ul>
            </li>
        </ul>
        <ul class="list-unstyled CTAs">
            <li> 
                <a href="#" class="download">Print Month Report</a> 
            </li>
        </ul>
    </nav>
    <div class="content-fluid w-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
            <button type="button" id="sidebarCollapse" class="btn btn-info"> 
                <i class="fa fa-align-justify"></i> 
            </button> 
            
            <div class="ml-auto popup"  >
                
                <ul class="nav nav-links">
                    <li class="p-2"><img src="<?php echo $image_path; ?>" alt="" style="width: 20px;"></li>
                    <li class="p-2">settings</li>
                    <li class="p-2">logout</li>
                </ul>
                    
            </div>
        </nav>

<script>
    
</script>