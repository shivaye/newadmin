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
              <div>Add Blog
              </div>
            </div>
            <div class="page-title-actions">
              <div class="d-inline-block dropdown">
                <a href="manage-blog.php">
                  <button type="button" class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                      <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Manage Blog
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="main-card mb-3 card">
              <div class="card-header">Add Blog</div>
              <?php
              if($_SESSION['msg']!="")
              {
                ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <?php echo $_SESSION['msg']; unset($_SESSION['msg']);?>
                </div>
                <?php
              }
              ?>
              <div class="app-container">
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-2">    
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-title">Title
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="first-title" class="form-control col-md-7 col-xs-12" name="heading" value="<?php echo $res['heading'];?>" placeholder="Heading">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-title">Slug
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="first-title" class="form-control col-md-7 col-xs-12" name="slug" value="<?php echo $res['slug'];?>" placeholder="Slug">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-content">Short Content
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                         <textarea class="form-control" name="short_content"><?php echo $res['short_content'];?></textarea>
                       </div>
                     </div>
                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-content">Content
                      </label>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                       <textarea class="form-control" name="content"><?php echo $res['content'];?></textarea>
                     </div>
                   </div>
                   <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image
                    </label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <input type="file" id="first-name" class="form-control col-md-7 col-xs-12" name="image">
                    </div>
                    <?php echo ($res['image']!="" and file_exists("../upload/".$res['image']))?"<img  src='../upload/".$res['image']."' height='150px;'>":"";?>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status
                    </label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <select id="event-status" name="status" class="form-control col-md-7 col-xs-12"> <option value='1' <?php if($res['status']=='1'){echo "selected";} ?> >Active</option>
                       <option value='0' <?php if($res['status']=='0'){echo "selected";} ?> >Deactive</option>
                     </select>
                   </div>
                 </div>
                 <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-outline-primary" onclick="myFunction()" type="button">Cancel</button>
                    <input type="hidden" name="hid_id" value="<?php echo $res['id'];?>">
                    <button type="submit" class="btn btn-outline-success" name="submit">Submit</button>
                  </div>
                </div>
              </div>
              <div class="col-sm-2">
              </div>
            </div>
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
