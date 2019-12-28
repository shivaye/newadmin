<?php
include("library/raso_function.php");

$elements=array("msg"=>"","type"=>"","phone"=>"");

$otp = addslashes($_POST['otp']);
$phone = addslashes($_POST['phone']);

$password = mt_rand(1000,9999);

if($otp=="")
{
	$elements['msg'] = "Please fill Otp";
	$elements['type'] = 1;

}else{


	$select_user = exeQuery("select * from ".TABLE_USER." where phone='".$phone."' and status=0 and otp ='".$otp."' ");
	$res_user = fetchAssoc($select_user);

	if($res_user)
	{
		$update = exeQuery("update ".TABLE_USER." set status=1 where password='".$password."' and phone='".$phone."' ");

		if($update){


			$to = $email;
			$subject = "benefit health-card From Ayushkamaheathcare";

			$message = "<P>Dear ".$res_user['name'].",</P>
			<P>
			Your Username is ".$res_user['username']." and password is ".$password." </p>
			";

			if($mail){
				$elements['msg']="mail sent our team contact you soon.";
			}else{
				$elements['msg']="oops something went wrong please try again later!!.";
			}

			$msg = "Dear ".trim($res_user['name'])." Your Username is ".$res_user['username']." and password is ".$password." ";
			$mm = str_replace(" ","%20","$msg");

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
			
			$elements['msg'] = "updated successfully";

		}else{
			$elements['msg'] = "some thing went wrong";
			$elements['type'] = 1;
		}

	}else{

		$elements['msg'] = "Mobile Number already registered";
		$elements['type'] = 1;
	}
}
echo json_encode($elements);
?>