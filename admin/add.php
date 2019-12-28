<?php
include('../library/raso_function.php');
check_admin();

if(isset($_POST['submit']))
{

  $heading=addslashes($_POST['heading']);
  $slug=addslashes($_POST['slug']);
  $short_content=addslashes($_POST['short_content']);
  $content=addslashes($_POST['content']);
  $status=addslashes($_POST['status']);
  $date=addslashes(date('Y-m-d'));


  $hid_id=($_POST['hid_id']!='')?addslashes($_POST['hid_id']):false;


  if(@$_FILES['image']['tmp_name']!="")
  {
    $image_name=time().$_FILES['image']['name'];
    if($_FILES['image']['type']=="image/png" or $_FILES['image']['type']=="image/jpeg" or $_FILES['image']['type']=="image/gif")
    {
      $file_move=move_uploaded_file($_FILES['image']['tmp_name'],"../upload/".$image_name);
      if(!$file_move)
      {
        $_SESSION['msg']="Image failed to upload!!!";
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
      $_SESSION['msg']="Please choose .jpg, . png, .gif to upload!!!";
      $_SESSION['msg_type']="alert-danger";
      header("Location:".$_SERVER[REQUEST_URI]);
      exit();
    }
  }
  elseif($hid_id==false)
  {
    $_SESSION['msg']="Please choose .jpg, . png, .gif to upload!!!";
    $_SESSION['msg_type']="alert-danger";
    header("Location:".$_SERVER[REQUEST_URI]);
    exit();
  }

  if($heading=="")
  {
    $_SESSION['msg']="field is empty";
    
  }else{

    if($hid_id==false)
    {

      $select_category=exeQuery("select * from ".TABLE_BLOG." where heading='".$heading."' and status=1 ");
      $res_category=fetchAssoc($select_category);

      if($res_category['heading']==$heading)
      {
       $_SESSION['msg']="blog name is already exists";
     }else{

      $insert=exeQuery("insert into ".TABLE_BLOG." set slug='".$slug."',short_content='".$short_content."',content='".$content."',heading='".$heading."',status='".$status."',date='".$date."' $set ");

      if($insert)
      {
       $_SESSION['msg']="Blog inserted successfully";
     }else{
       $_SESSION['msg']="something went wrong";
     }
   }
 }else{

  $insert=exeQuery("update ".TABLE_BLOG." set slug='".$slug."',short_content='".$short_content."',content='".$content."',heading='".$heading."',status='".$status."',date='".$date."' $set where id='".$hid_id."' ");

  if($insert)
  {
   $_SESSION['msg']="Blog updated successfully";
 }else{
   $_SESSION['msg']="something went wrong";
 }
}
}
}

if(@$_REQUEST['id']!="")
{
  $id=$_REQUEST['id'];
  $qry_edit=exeQuery("select * from ".TABLE_BLOG." where id='".$id."'");
  $res=fetchAssoc($qry_edit);
}

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Language" content="en">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="This is an example dashboard created using build-in elements and components.">
  <meta name="msapplication-tap-highlight" content="no">
  <link href="./main.css" rel="stylesheet">
</head>
<body>
  <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
   <!-- header start  -->
   <?php include("include/header.php");?>
   <!-- header end -->

   <!-- theme settings -->
   <?php include("include/theme.php");?>
   <!-- theme setting ends -->
   <div class="app-main">
    <div class="app-sidebar sidebar-shadow">
      <!-- sidebar start -->
      <?php include("include/sidebar.php");?>
      <!-- sidebar end -->
    </div>
    <div class="app-main__outer">
      <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div>Manage Profile
                                    </div>
                                </div>
                                 <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                                            Buttons
                                        </button>
                                    </div>
                                </div>
                              </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Manage Profile</h5>
                                        <form class="">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Email</label><input name="email" id="exampleEmail11" placeholder="with a placeholder" type="email" class="form-control"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="examplePassword11" class="">Password</label><input name="password" id="examplePassword11" placeholder="password placeholder" type="password" class="form-control"></div>
                                                </div>
                                            </div>
                                            <div class="position-relative form-group"><label for="exampleAddress" class="">Address</label><input name="address" id="exampleAddress" placeholder="1234 Main St" type="text" class="form-control"></div>
                                            <div class="position-relative form-group"><label for="exampleAddress2" class="">Address 2</label><input name="address2" id="exampleAddress2" placeholder="Apartment, studio, or floor" type="text" class="form-control">
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="exampleCity" class="">City</label><input name="city" id="exampleCity" type="text" class="form-control"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="position-relative form-group"><label for="exampleState" class="">State</label><input name="state" id="exampleState" type="text" class="form-control"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group"><label for="exampleZip" class="">Zip</label><input name="zip" id="exampleZip" type="text" class="form-control"></div>
                                                </div>
                                            </div>
                                            <button class="mt-2 btn btn-primary">Sign in</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
      <!-- footer start -->
      <?php include("include/footer.php");?>
      <!-- footer end -->
    </div>
  </div>
</div>
<script src="tinymce/js/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: 'textarea'
  });
</script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>

</body>
</html>
