<?php

include 'conn.php';

$id = $_GET['id'];

$q = " DELETE FROM `loss` WHERE id = $id "; //loss is a table name

mysqli_query($con, $q);

header('location:display.php');

?>