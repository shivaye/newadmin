<?php
include('library/raso_function.php');
$page = "membership.php";

if($_SESSION['user_id']=="")
{
	header("location:../orrish-height.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="eng">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable = no" name="viewport" />
	<title>Orrish Society | Investor</title>
	<script src="https://use.fontawesome.com/10df981e81.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/menu.css">
	<link rel="stylesheet" href="../css/banner.css">
	<link rel="stylesheet" href="../css/layout.css">
</head>

<?php include('header.php');?>

<div class="container-fluid padd">
	<div class="about-banner">
		<img src="../images/investor-banner.jpg" class="img-responsive">
		<div class="inner">Membership</div>
	</div> 
</div>      
<section class="section1">
	<div class="container ">
		<div class="row about-middle">
			<div class="col-md-12"> <div class="tagline"><h1>Membership</h1></div> </div>
			<div class="col-md-12">
				<p>Membership Payment : 8500
				</p> 
				<div class="payment-form" id="payment-form" >
					<form name="postForm" id="payuform" action="../payu/PayUMoney_form.php" method="POST" >
						<tr>
							<!-- <td>txnid</td> -->
							<td><input type="hidden" name="txnid" value="<?php echo $txnid=time().rand(1000,999999); ?>" /></td>
						</tr>
						<tr>
							<!-- <td>firstname</td> -->
							<td><input type="hidden" name="firstname" value="<?php echo $res_user['name'];?>" /></td>
						</tr>
						<tr>
							<!-- <td>email</td> -->
							<td><input type="hidden" name="email" value="<?php echo $res_user['email'];?>" /></td>
						</tr>
						<tr>
							<!-- <td>email</td> -->
							<td><input type="hidden" name="amount" value="8500" /></td>
						</tr>
						<tr>
							<!-- <td>phone</td> -->
							<td><input type="hidden" name="phone" value="<?php echo $res_user['phone'];?>" /></td>
						</tr>
						<tr>
							<!--  <td>productinfo</td> -->
							<td><input type="hidden" name="productinfo" value="3" /></td>
						</tr>
						<tr>
							<!-- <td>success url</td> -->
							<td><input type="hidden" name="surl" value="http://localhost/infraclimb/payu/success.php" size="64" /></td>
						</tr>
						<tr>
							<!-- <td>failure url</td> -->
							<td><input type="hidden" name="furl" value="http://localhost/infraclimb/payu/failure.php" size="64" /></td>
						</tr>
						<tr>
							<?php
							if($_SESSION['user_id']!="")
							{
								?>
								<td><input type="submit" id="payu" value="Proceed to Pay" class="btn btn-primary" /></td>
								<?php
							}else{
								?>
								<td><input type="button" id="payu" onclick="alert('please fill all detials')"  value="Checkout" class="btn btn-primary" /></td>
								<?php
							}
							?>
						</tr>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php include('footer.php');?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>