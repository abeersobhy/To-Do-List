<?php

$connection = mysqli_connect("localhost", "root", "", "toDoApp");

if (!$connection) 
{
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST")
{

    if (isset($_POST['task_id'])) 
    {
        $task_id = $_POST['task_id'];
        $sql = "DELETE FROM tasks
                where id = $task_id";
        $result = mysqli_query($connection, $sql);
        echo mysqli_affected_rows($connection); 
        if(mysqli_affected_rows($connection) == 1)
        {
            $_SESSION['delete'] = "task deleted successfully";
            header("Location:../index.php");
        }
    }
}
?>