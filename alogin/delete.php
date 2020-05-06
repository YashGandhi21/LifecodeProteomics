<?php
    $con = mysqli_connect('localhost','root','','iwp');
    
    $id = $_GET['id'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $msg = $_GET['msg'];


    $sql = "insert into sorted_queries select * from query where id='$id';";
	$stmt = mysqli_query($con,$sql);
    
    $delete_query = "delete from query where id='$id'";
    $data = mysqli_query($con,$delete_query);

    if($data)
    {   
        header("location: ../index.php");
    }

?>