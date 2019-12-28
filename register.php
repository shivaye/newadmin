<?php
include("library/raso_function.php");

$elements=array("msg"=>"","type"=>"","phone"=>"");

$name = addslashes($_POST['name']);
$email = addslashes($_POST['remail']);
$phone = addslashes($_POST['phone']);

$username =substr($name, 0, 4).substr($phone, -4); 

$otp = mt_rand(1000,9999);
$msg = "Dear ".trim($name)." Your otp is this ".$otp." ";
$mm = str_replace(" ","%20","$msg");

if($phone=="")
{
	$elements['msg'] = "Please fill all the Fields";
	$elements['type'] = 1;
}else{


	$select_user = exeQuery("select * from ".TABLE_USER." where phone='".$phone."' and status=1 ");
	$res_user = fetchAssoc($select_user);

	if($res_user['phone']==$phone)
	{
		$elements['msg'] = "Mobile Number already registered";
		$elements['type'] = 1;

	}else{

		$insert = exeQuery("insert into ".TABLE_USER." set name='".$name."',phone='".$phone."',email='".$email."',date='".date('Y-m-d')."',status=0,otp='".$otp."',username='".$username."' ");

		if($insert){

			$url="http://msg.icloudsms.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=28d5503ec469da0ed6f8376f6ae6919&message=$mm&senderId=AYSHKM&routeId=1&mobileNos=$phone&smsContentType=english";

			$curl = curl_init();


        // Set some options - we are passing in a useragent too here
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $url,
				CURLOPT_USERAGENT => 'Codular Sample cURL Request'
			));
          // Send the request & save response to $resp
			$resp2 = curl_exec($curl);

          //$api_status2 = $resp2['status'];
			curl_close($curl);

			$elements['msg'] = "inserted successfully";
			$elements['phone'] = $phone;

		}else{
			$elements['msg'] = "some thing went wrong";
			$elements['type'] = 1;
		}
	}



}


echo json_encode($elements);

?>