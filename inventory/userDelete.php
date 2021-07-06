<?php
session_start();
include("includes/dbcon.php");

if(isset($_GET["id"]) AND !empty($_GET["id"]))
{
    $id = htmlspecialchars($_GET['id']);
    if(isset($_GET["name"]) AND !empty($_GET["name"]))
    {
        $name = htmlspecialchars($_GET['name']);

        $req = $conn->prepare("DELETE FROM users WHERE id=?");
        $req->execute(array($id));
        header("Location: user.php?message='success'");
    }
    else
    {
        header("Location: user.php?message='error occur'");
    }


}
else
{
    header("Location: user.php?message='error occur'");
}
$conn = null;
?>