<?php 
require('../conn.php'); 

if(isset($_GET['delid'])){
    $delid = $_GET['delid'];
    $sql = "DELETE FROM coffee_shop WHERE id='$delid'";
    $query = mysqli_query($con,$sql);
    if($query){
        header('Location:../post.php'); 
    }
    else{
        echo "No success";
    }
}



?>