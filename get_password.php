<?php
include('library/raso_function.php');

$elements=array("msg"=>"","type"=>"","phone"=>"");

$phone = addslashes($_POST['phone']);

  if($phone==""){
    
    $elements['msg']="Please Enter Your Mobile Number";
    $elements['type'] = 1;
  }else{

    $select_user=exeQuery("select * from ".TABLE_USER." where phone='".$phone."' and status=1 ");

        if($res_user=fetchAssoc($select_user)){

        $elements['msg']=forgetPasswordmobileuser($phone);
    }else{
        $elements['msg']="invalid details!!";
        $elements['type'] = 1;
    }
  }
echo json_encode($elements);
?>