<?php 

include "connection.php";
session_start();
if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $nome=$_POST["nome"];
    $idade=$_POST["idade"];
    $genero=$_POST["genero"];

    $sql="UPDATE pessoa SET nome='{$nome}',idade='{$idade}',genero='{$genero}' WHERE id={$id}";

    $run_sql=mysqli_query($conn,$sql);
    if($run_sql){
        $_SESSION["success"]="Data Update Successfully";
        header("location:../index.php");
    }else{
        $_SESSION["error"]="Data Not Update Successfully";
        header("location:../edit-data.php");

    }
}


?>
