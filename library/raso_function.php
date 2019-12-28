<?php
include("raso_config_db.php");


function exeQuery($qry)
{
	$dbObj=conn1();

	return mysqli_query($dbObj,$qry);	
}
function inserted_id($qry)
{
	$dbObj=conn1();

	$ret=mysqli_query($dbObj,$qry);
	
	$inserted_id=mysqli_insert_id($dbObj);
	
	return ($inserted_id)?$inserted_id:$ret;
	
}
function fetchAssoc($res)
{
	return mysqli_fetch_assoc($res);
}
function num_res($res)
{
	return mysqli_num_rows($res);
}
function num_fields($res)
{
	return mysqli_num_fields($res);
}
function field_name($res)
{
	return mysqli_fetch_field($res);
}

function filterVar($val)
{
	return addslashes($val);
}

function singleFetch($tbl,$refId)
{
	$sql=exeQuery("select * from $tbl where `id`='$refId'");
	$data=fetchAssoc($sql);
	return $data;
}

function post()
{
	foreach($_POST as $name=>$val)
	{
		$name=filterVar($name);
		$val=filterVar($val);
		$_POST[$name]=$val;
	}
}

//------------------------------check for admin login and Party--------------------------------
function check_admin()
{
	if((@$_SESSION['admin_id']!=""))
	{
		$id=$_SESSION['admin_id'];

		$sel_admin=exeQuery("select * from ".TABLE_ADMIN." where status='1' and id='$id'");
		$res_admin=fetchAssoc($sel_admin);

		$_SESSION['admin_id']=$res_admin['id'];
		$_SESSION['email']=$res_admin['email'];
		$head=num_res($sel_admin);
	}
	if(!$head)
	{
		header("Location:login.php");
		exit();
	}
}


function dateFormat($fullDate,$forDb=false)//true for db encrypting : false for showing to date section
{
	if($fullDate!="")
	{
		if($forDb)//mm/dd/YY to YY-MM-DD
		{
			$fullDate=explode("/",$fullDate);// 0 - m , 1 - d, 2 - y
			$date=$fullDate[1];
			$mon=$fullDate[0];
			$year=$fullDate[2];
			$cnvrt=$year."-".$mon."-".$date;
		}
		else//YY-MM-DD to mm/dd/YY
		{
			$fullDate=explode("-",$fullDate);// 0 - y , 1 - m, 2 - d
			$date=$fullDate[2];
			$mon=$fullDate[1];
			$year=$fullDate[0];
			$cnvrt=$mon."/".$date."/".$year;
		}
	}
	else
	{
		$cnvrt=false;
	}
	
	return $cnvrt;
}

function forgetPassword($email)
{
	$user_sel=exeQuery("select * from ".TABLE_CUTOMERS." where email='".$email."' ");

	if($user_data=fetchAssoc($user_sel))
	{
		$passwrd2=rand(1000,9999);
		$passwrd=md5($passwrd2);
		
		$user_upd=exeQuery("update ".TABLE_CUTOMERS." set password='".$passwrd."' where email='".$email."' ");

		if($user_upd)
		{
			$email_to = $email;
			$email_subject = "Password recovery mail - ".SITENAME;
			$email_from=I_MAIL;

			$email_message="Hi ".$user_data['name'].
			"<br>Your new password is generated automatically Please change your password after login.<br>Username:".$user_data['email']."<br> Password : ".$passwrd2;

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			$headers .= 'From:' .$email_from."\r\n";

			$mailSent=mail($email_to,$email_subject, $email_message,$headers);

		}
	}
	if($mailSent)
	{
		return  "Your Password have been successfully sent. Please check your mail!!";
	}
	else
	{
		return  "OOPS!! your request have been failed to send. Please check email you provide or try again!!";
	}
}
//----------forget password phone----------------------


function forgetPasswordmobile($phone)
{
	$user_sel=exeQuery("select * from ".TABLE_ADMIN." where phone='".$phone."' ");

	if($user_data=fetchAssoc($user_sel))
	{
		$passwrd2=rand(1000,9999);
		$passwrd=$passwrd2;
		
		$user_upd=exeQuery("update ".TABLE_ADMIN." set password='".$passwrd."' where phone='".$phone."' ");

		if($user_upd)
		{
			$phone = $phone;

			$message="Hi%20".$user_data['username']."%20Your%20new%20password%20is%20generated%20automatically%20Please%20change%20your%20password%20after%20login.%20Username:".$user_data['email']."%20Password%20:%20".$passwrd2;

		// $url="http://prosms.contourdigitalmedia.com/http-tokenkeyapi.php?authentic-key=3933557262616e66617368696f6e3937351564988043&senderid=UFASHN&route=5&number=$phone&message=$message";

		$url="http://msg.icloudsms.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=28d5503ec469da0ed6f8376f6ae6919&message=$message&senderId=AYSHKM&routeId=1&mobileNos=$phone&smsContentType=english";

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
		}
	}
	if($resp2)
	{
		return  "Your Password have been successfully sent. Please check your Phone!!";
	}
	else
	{
		return  "OOPS!! your request have been failed to send. Please check Phone you provide or try again!!";
	}
}

function forgetPasswordmobileuser($phone)
{
	$user_sel=exeQuery("select * from ".TABLE_USER." where phone='".$phone."' and status=1 ");

	if($user_data=fetchAssoc($user_sel))
	{
		$passwrd2=rand(1000,9999);
		$passwrd=$passwrd2;
		
		$user_upd=exeQuery("update ".TABLE_USER." set password='".$passwrd."' where phone='".$phone."' ");

		if($user_upd)
		{
			$phone = $phone;

			$message="Hi%20".$user_data['name']."%20Your%20new%20password%20is%20generated%20automatically%20Please%20change%20your%20password%20after%20login.%20Username:".$user_data['username']."%20Password%20:%20".$passwrd2;

		// $url="http://prosms.contourdigitalmedia.com/http-tokenkeyapi.php?authentic-key=3933557262616e66617368696f6e3937351564988043&senderid=UFASHN&route=5&number=$phone&message=$message";

		$url="http://msg.icloudsms.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=28d5503ec469da0ed6f8376f6ae6919&message=$message&senderId=AYSHKM&routeId=1&mobileNos=$phone&smsContentType=english";

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
		}
	}
	if($resp2)
	{
		return  "Your Password have been successfully sent. Please check your Phone!!";
	}
	else
	{
		return  "OOPS!! your request have been failed to send. Please check Phone you provide or try again!!";
	}
}


// function checkStatus($status=false)
// {

// 	if($status)
// 		return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
// 	else
// 		return '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
// }

function checkStatus($status=false)
{
	
	if($status)
		return '<div class="badge badge-success">Activate</div>';
	else
		return '<div class="badge badge-danger">Deactivate</div>';
}

function fetchImage($id)
{
	$sel_image=exeQuery("select * from ".TABLE_IMAGES." where id='".$id."'");
	$res_image=fetchAssoc($sel_image);
	return $image="upload/".$res_image['image'];
}

function favicon()
{
	$sel_favicon=exeQuery("select favicon from ".TABLE_LOGIN." where 1=1");
	$res_image=fetchAssoc($sel_favicon);
	return $image="<link rel='shortcut icon' href='upload/".$res_image['favicon']."'>";
}

function formData($tbl,$field=false)
{
	if($field==false)
	{
		$qry_sel=exeQuery("select * from `".$tbl."` where 1=1");
	}
	else
	{
		$qry_sel=exeQuery("select * from `".$tbl."` where 1=1 and option_type='".$field."'");
	}
	
	return $qry_sel;
}

function agla_page($page)
{
	echo "<script>window.location='".$page."';</script>";
	exit();
}
?>

