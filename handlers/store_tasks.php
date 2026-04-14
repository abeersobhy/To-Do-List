<?php
session_start();

$connection = mysqli_connect("localhost","root","","toDoApp");
if(!$connection)
{
    echo "connection error". mysqli_connect_error($connection);
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));
    $priority = trim(htmlspecialchars(htmlentities($_POST['priority'])));
    $result_title = validate_title($title);
    $result_priority = validate_priority($priority);

    if($result_title == true  &&  $result_priority == true)
    {
        //Insert data if it is valid
        $sql = "INSERT INTO tasks (title, priority)
                VALUES('$title', '$priority')";
        
        $result = mysqli_query($connection, $sql);
        // database is updated
        if(mysqli_affected_rows($connection) == 1)
        {
            $_SESSION['success'] = "task added successfully";
            header("Location:../index.php");
        }
    }    
    else if($result_title == false)
    {
        $_SESSION['emptyTitle'] = "task description is required";
    }
    else
    {
        $_SESSION['emptyPriority'] = "task priority is required";
    }

}
function validate_title($title_cp)
{
    if(empty($title_cp))
    {
        return false;
    }
    else
    {
        return true;
    }
}
function validate_priority($priority_cp)
{
    if(empty($priority_cp))
    {
        return false;
    }
        else
    {
        return true;
    }
}
?>