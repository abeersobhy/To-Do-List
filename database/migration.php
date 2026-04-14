<?php
$connection = mysqli_connect("localhost", "root", "");

if(!$connection)
{
    echo "Connection error". mysqli_connect_error($connection);
}

echo "<pre>";
var_dump($connection);

// create database

//$createDatabase = "CREATE DATABASE toDoApp";

//mysqli_query($connection , $createDatabase);

$dataBaseConn = mysqli_connect("localhost", "root", "", "toDoApp");
/*
$createTable_tasks = "CREATE TABLE tasks(
    id INT PRIMARY KEY AUTO_INCREMENT,
    title varchar(250) NOT NULL
)";

mysqli_query($dataBaseConn, $createTable_tasks)
*/

$alter_tasks = "ALTER TABLE tasks 
                ADD createdAt DATETIME DEFAULT CURRENT_TIMESTAMP";

mysqli_query($dataBaseConn, $alter_tasks);
               
?>