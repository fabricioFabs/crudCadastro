<?php 

include "connection.php";

session_start();
if(isset($_POST["submit"])){
    $nome=$_POST["nome"];
    $idade=$_POST["idade"];
    $genero=$_POST["genero"];

    $sql="INSERT INTO pessoa (nome,idade,genero) VALUES ('{$nome}','{$idade}','{$genero}')";
    $run_sql=mysqli_query($conn,$sql);

    if($run_sql){
        $_SESSION["success"]="Data Add Successfully";
        header("location:../index.php");
    }else{
        $_SESSION["error"]="Data Not Add Successfully";
        header("location:../add-data.php");
    }

}


?>