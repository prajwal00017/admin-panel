<?php 
require('conn.php');

if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $sql = "DELETE FROM tb_employees WHERE id='$id'";
    $query = mysqli_query($con,$sql);
    if($query){
        header('Location:index.php');
    }
    else{
        echo " Mistake! ";
    }
}


?>