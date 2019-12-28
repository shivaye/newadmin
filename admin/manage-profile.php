<?php
include("../library/raso_function.php");
check_admin();

if(isset($_POST['submit']))
{
  $username=$_POST['name'];
  $email=$_POST['email'];
  $qry_mail=$_POST['qry_email'];
  $phone=$_POST['phone'];

  if($_POST['password']!="")
  {
    $pass.=" , password='".$_POST['password']."'";
  }

  if(@$_FILES['image']['tmp_name']!="")
  {
    $image_name=time().$_FILES['image']['name'];
    if($_FILES['image']['type']=="image/png" or $_FILES['image']['type']=="image/jpeg" or $_FILES['image']['type']=="image/gif")
    {
      $file_move=move_uploaded_file($_FILES['image']['tmp_name'],"../upload/".$image_name);

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
    $qry_event_image=exeQuery("select * from ".TABLE_ADMIN." where id='".$_SESSION['id']."'");
    $res_image=fetchAssoc($qry_event_image);
    if($res_image['image']!="")
    {
      unlink("../upload/".$res_image['image']);
    }
  }

  $update=exeQuery("update ".TABLE_ADMIN." set username='".$username."',email='".$email."',qry_mail='".$qry_mail."',phone='".$phone."' $set$pass where id='".$_SESSION['admin_id']."' ");

  if($update)
  {
    $_SESSION['msg']="Profile update successfully.";
  }else{
    $_SESSION['msg']="Some thing went wrong.";
  }
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
    <!-- include theme -->
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
            </div>
          </div>
          <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">

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
              <div class="main-card mb-3 card">
                <div class="card-body">
                  <h5 class="card-title">Manage Profile</h5>
                  <form class="" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                      <div class="col-md-6">
                        <div class="position-relative form-group">
                          <label for="exampleEmail11" class="">Name</label>
                          <input name="name" id="exampleEmail11" placeholder="Name" type="text" class="form-control" value="<?php echo $res_admin['username'];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="position-relative form-group">
                          <label for="exampleEmail11" class="">Email</label>
                          <input name="email" id="exampleEmail11" placeholder="Email" type="email" class="form-control" value="<?php echo $res_admin['email'];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="position-relative form-group">
                          <label for="exampleEmail11" class="">Query Email</label>
                          <input name="qry_email" id="exampleEmail11" placeholder="Query Email" type="email" class="form-control" value="<?php echo $res_admin['qry_mail'];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="position-relative form-group">
                          <label for="Phone" class="">Phone</label>
                          <input name="phone" id="Phone" placeholder="Phone" type="Phone" class="form-control" value="<?php echo $res_admin['phone'];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="position-relative form-group">
                          <label for="exampleAddress" class="">Password</label>
                          <input name="password" id="exampleAddress" placeholder="password" type="password" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6">
                        <div class="position-relative form-group">
                          <label for="exampleCity" class="">Image</label>
                          <input name="image" id="exampleCity" type="file" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="position-relative form-group">
                         <?php echo ($res_admin['image']!="" and file_exists("../upload/".$res_admin['image']))?"<img  src='../upload/".$res_admin['image']."' height='150px;'>":"<img class='img-responsive' src='../images/blog1.png' height='150px;'>";?></div>
                       </div>
                     </div>
                     <button class="mt-2 btn btn-primary" name="submit" type="submit">Update</button>
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