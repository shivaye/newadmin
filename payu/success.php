<?php 
include("../library/raso_function.php");

if($_POST['amount']=="")
{
  header("location:../index.php");
  exit();
}

if($_POST['amount']!="")
{
  $insert  = exeQuery("insert into ".TABLE_MEMBERSHIP." set member_id='".$_SESSION['user_id']."',property_id='".$_POST['productinfo']."',paid_amount='".$_POST['amount']."',payment='done',created_date='".date('Y-m-d')."',status=1 ");

  if($insert){
    echo "hello";
  }else{
    echo "something went wrong";
  }
}

?>
