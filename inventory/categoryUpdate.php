<?php
session_start();
include("includes/dbcon.php");

if(isset($_GET["id"]) AND !empty($_GET["id"]))
{
    $id = htmlspecialchars($_GET['id']);
    if(isset($_GET["name"]) AND !empty($_GET["name"]))
    {
        $name = htmlspecialchars($_GET['name']);

        $req = $conn->prepare("UPDATE categories SET names=:nom WHERE id=:id");
        $req->execute([
            "nom" => $name,
            "id" => $id
        ]);
        header("Location: categories.php?message='success'");
    }
    else
    {
        header("Location: categories.php?message='error occur'");
    }


}
else
{
    header("Location: categories.php?message='error occur'");
}
$conn = null;
?>