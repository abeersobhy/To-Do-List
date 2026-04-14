<?php

$connection = mysqli_connect("localhost", "root", "", "toDoApp");

if (!$connection) 
{
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST")
{

    if (isset($_POST['title'])) 
    {
        $task_id = $_POST['task_id']; 
        $title = $_POST['title'];
        $priority = $_POST['priority'];

        echo $task_id." ";
        echo $title." ";
        echo $priority." ";
        
        $sql = "UPDATE tasks
                SET title = '$title'
                , priority = '$priority' , createdAt = CURRENT_TIMESTAMP
                where id = $task_id";

        $result = mysqli_query($connection, $sql);
        echo mysqli_affected_rows($connection); 
        if(mysqli_affected_rows($connection) == 1)
        {
            $_SESSION['edit'] = "task has been edited successfully";
            header("Location:../index.php");
        }
    }
}
?>