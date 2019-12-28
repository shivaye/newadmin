<?php
include("../library/raso_function.php");
check_admin();

if(isset($_REQUEST['delete']))
{
  $ids=$_REQUEST['record'];
  
  if(is_array($ids))
  {
    $ids=implode(",",$_REQUEST['record']);
    
    $sql_del=exeQuery("delete from ".TABLE_BLOG." where id on ( '".$ids."' )");
}
else
{
    $sql_slider=exeQuery("select * from ".TABLE_BLOG." where id = '".$ids."' ");
    $res_slider=fetchAssoc($sql_slider);
    if($res_slider['image']!="" and file_exists("../upload/".$res_slider['image']))
    {
        unlink("../upload/".$res_slider['image']);
    }
    
    $sql_del=exeQuery("delete from ".TABLE_BLOG." where id = '".$ids."' ");
}

if($sql_del)
{
    $_SESSION['msg']=DELETE_MSG;
    $_SESSION['msg_type']="alert-success";
}
else
{
    $_SESSION['msg']=DELETE_ERROR;
    $_SESSION['msg_type']="alert-danger";
}
header("Location:".$_SERVER[PHP_SELF]);
exit();
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
                  <div>Manage Blog
                  </div>
              </div>
              <div class="page-title-actions">
                  <div class="d-inline-block dropdown">
                    <a href="add-blog.php">
                      <button type="button" class="btn-shadow dropdown-toggle btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                          <i class="fa fa-business-time fa-w-20"></i>
                      </span>
                      Add Blog
                  </button>
              </a>
          </div>
      </div>
  </div>
</div>
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Blogs</div>
                                <!-- <div class="widget-subheading">Last year expenses</div> -->
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span><?php echo $count_blog;?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Manage Blog
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                    while($res_category=fetchAssoc($select_category))
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-center text-muted">#<?php echo $i;?></td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                               <?php echo ($res_category['image']!="" and file_exists("../upload/".$res_category['image']))?"<img  src='../upload/".$res_category['image']."'  class='rounded-circle' height='42px' >":" <img width='40' class='rounded-circle' src='assets/images/avatars/4.jpg' alt='>";?>
                                                           </div>
                                                       </div>
                                                       <div class="widget-content-left flex2">
                                                        <div class="widget-heading"><?php echo ucfirst($res_category['heading']);?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span style="display:none;"><?php echo $res_category['status'];?></span><?php echo checkStatus($res_category['status']);?>
                                        </td>
                                        <td class="text-center">
                                            <a href="add-blog.php?id=<?php echo $res_category['id'];?>"><button type="button" id="PopoverCustomT-1" class="btn btn-success btn-sm">Edit</button></a>
                                            <a onClick="return confirm('Are You Sure want To Delete Blog')" href="?record=<?php echo $res_category['id'];?>&delete"><button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Delete</button></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer start -->
    <?php include("include/footer.php");?>
    <!-- footer end -->
</div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
</body>

<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
