<?php
    include('./connection.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM recipes WHERE id=" .$id;
    $result = mysqli_query($con, $sql);
    if($result)
        {
            mysqli_close($con);
            header("location:../../");
            exit;	
        }
        else
        {
            echo "Error deleting record";
        }
