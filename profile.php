<?php
include('library/raso_function.php');
$page = "";

if(isset($_POST['submit']))
{
  $username=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];


  if(@$_FILES['image']['tmp_name']!="")
  {
    $image_name=time().$_FILES['image']['name'];
    if($_FILES['image']['type']=="image/png" or $_FILES['image']['type']=="image/jpeg" or $_FILES['image']['type']=="image/gif")
    {
      $file_move=move_uploaded_file($_FILES['image']['tmp_name'],"upload/".$image_name);

      if(!$file_move)
      {
        $_SESSION['sess_msg']="Image failed to upload!!!";
        $_SESSION['msg_type']="alert-danger";
        header("Location:".$_SERVER[REQUEST_URI]);
        exit();
      }
      else
      {
        $set.=" , image='".$image_name."'";
      }
    }
    else
    {
      $_SESSION['sess_msg']="Please choose .jpg, . png, .gif to upload!!!";
      $_SESSION['msg_type']="alert-danger";
      header("Location:".$_SERVER[REQUEST_URI]);
      exit();
    }
  }

  if($file_move)
  {
    $qry_event_image=exeQuery("select * from ".TABLE_USER." where id='".$_SESSION['id']."'");
    $res_image=fetchAssoc($qry_event_image);
    if($res_image['image']!="")
    {
      unlink("upload/".$res_image['image']);
    }
  }

  $update=exeQuery("update ".TABLE_USER." set name='".$username."',email='".$email."',phone='".$phone."' $set $pass where id='".$_SESSION['user_id']."' ");

  if($update)
  {
    $_SESSION['msg']="Profile update successfully.";
  }else{
    $_SESSION['msg']="Some thing went wrong.";
  }
}


if(isset($_POST['password_login']))
{
  $password=$_POST['password'];

  $update=exeQuery("update ".TABLE_USER." set password='".$password."' where id='".$_SESSION['user_id']."' ");

  if($update)
  {
    $_SESSION['msg']="password update successfully.";
  }else{
    $_SESSION['msg']="Some thing went wrong.";
  }
}

$select_membership = exeQuery("select m.*,p.*,m.id as mid,p.id as pid from ".TABLE_MEMBERSHIP." as m left join ".TABLE_PACKAGE." as p on (m.property_id=p.id) where m.member_id='".$_SESSION['user_id']."' and payment='done' ");
?>
<!DOCTYPE html>
<html lang="eng">
<head>
  <meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable = no" name="viewport" />
  <title>Orrish Society | Investor</title>
  <script src="https://use.fontawesome.com/10df981e81.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/banner.css">
  <link rel="stylesheet" href="css/layout.css">
</head>

<?php include('header.php');?>

<section class="section1">
	 <?PHP
              if($_SESSION['msg']!="")
              {
                ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <?PHP ECHO $_SESSION['msg']; unset( $_SESSION['msg']);?>
                </div>
                <?PHP
              }
              ?>
<div class="container ">
<div class="row about-middle">
<div class="col-md-12"> <div class="tagline"><h1>Profile</h1></div> </div>
<div class="col-md-12">
<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
<fieldset>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="full_name">Name</label>  
  <div class="col-md-4">
  <input id="full_name" name="name" type="text" placeholder="your full name" class="form-control input-md" value="<?php echo $res_user['name'];?>" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="studio_name">User Name</label>  
  <div class="col-md-4">
  <input id="studio_name" name="studio_name" type="text" placeholder="your yoga studio" class="form-control input-md" value="<?php echo $res_user['username'];?>" readonly>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone_number">Phone Number</label>  
  <div class="col-md-4">
  <input id="phone_number" name="phone" type="text" placeholder="for setting up a demo call" class="form-control input-md" value="<?php echo $res_user['phone'];?>" readonly>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email_id">Email Id</label>  
  <div class="col-md-4">
  <input id="email_id" name="email" type="text" placeholder="if phone is unreachable" class="form-control input-md" value="<?php echo $res_user['email'];?>" required="">
  </div>
   <?php echo ($res_user['image']!="" and file_exists("upload/".$res_user['image']))?"<img  src='upload/".$res_user['image']."'  class='media-object'>":"";?>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email_id">File</label>  
  <div class="col-md-4">
  <input id="email_id" name="image" type="file" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" type="submit" name="submit" class="btn btn-primary">Update</button>
  </div>
</div>
</fieldset>
</form>
</div>
<div class="row about-middle">
<div class="col-md-12"> <div class="tagline"><h1>Change Password</h1></div> </div>
<div class="col-md-12">
<form class="form-horizontal" method="POST" action="">
<fieldset>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="full_name">Password</label>  
  <div class="col-md-4">
  <input id="full_name" name="password" type="text" placeholder="Password" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" type="submit" name="password_login" class="btn btn-primary">Change Password</button>
  </div>
</div>

</fieldset>
</form>
<div class="row about-middle">
<div class="col-md-12"> <div class="tagline"><h1>Membership</h1></div> </div>
<div class="col-md-12">
<div class="container">          
  <table class="table table-hover">
    <thead>
      <tr>
      	<th>S.no.</th>
        <th>Property Name</th>
        <th>Amount</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	$i=1;
    		while($res_user = fetchAssoc($select_membership)){
    	?>
      <tr>
      	<td><?php echo $i;?></td>
        <td><?php echo $res_user['title'];?></td>
        <td><?php echo $res_user['paid_amount'];?></td>
        <td><a href="invoice.php?id=<?php echo $res_user['mid'];?>">invoice</a></td>
      </tr>
      <?php
      $i++;
      	}
      ?>
    </tbody>
  </table>
</div>
</div>


</div></div>
</section>


<?php include('footer.php');?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>