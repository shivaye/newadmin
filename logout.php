<?php
include('library/raso_function.php');

unset($_SESSION['user_id']);
header("location:index.php");
exit();

?>