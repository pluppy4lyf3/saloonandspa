<?php

	

if(isset($_POST['delete']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "test_db";
    
    // get id to delete
    $id = $_POST['id'];
	
	// connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
	
	
    // mysql delete query 
    $query = "DELETE FROM `contacts` WHERE `id` = $id";
    
    $result = mysqli_query($connect, $query);
    
    if($result)
    {
        echo 'Data Deleted';
    }else{
        echo 'Data Not Deleted';
    }
	
	mysqli_close($connect);
}
	

?>