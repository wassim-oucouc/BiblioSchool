<?php

include_once('.././src/classes/user.php');

$id_user = $_GET['delete_id'];

$newdelete = new user();
$newdelete->delete($id_user);


header( "refresh:3; url=dashboard-admin.php" );


?>