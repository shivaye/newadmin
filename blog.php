<?php
include('library/raso_function.php');

$limit = 2; 
$page = isset($_GET['page']) ?$_GET['page']:1;
$start = ($page - 1) * $limit;

$select_blog = exeQuery("select * from ".TABLE_BLOG." where status=1 limit $start,$limit ");
$select_blog2 = exeQuery("select * from ".TABLE_BLOG." where status=1");
$total = num_res($select_blog2);
$pages = ceil($total / $limit);

$Previous = $page -1;
$Next = $page + 1;

$select_blog1 = exeQuery("select * from ".TABLE_BLOG." order by id desc limit 6"); 

?>
<!DOCTYPE html>
<html lang="eng">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable = no" name="viewport" />
  <title>Orrish Society | Blog</title>
  <script src="https://use.fontawesome.com/10df981e81.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/banner.css">
  <link rel="stylesheet" href="css/layout.css">
</head>

<?php include('header.php');?>

<div class="container-fluid padd">
  <div class="about-banner">
    <div col-md-12>
     <img src="images/about-us-banner.jpg" class="img-responsive">
   </div>
   <div class="inner">Blog</div>
 </div> 
</div>   
</div>    


<section class="section1">
  <div class="container ">
    <div class="row about-middle">
      <div class="col-md-12 bott-spc2"> <div class="heading"><h1>Blog</h1></div> </div>
      <div class="col-md-8">
        <?php
        while($res_blog = fetchAssoc($select_blog))
        {
          ?>
          <div class="media">
            <div class="media-left">
              <a href="#">
               <?php echo ($res_blog['image']!="" and file_exists("upload/".$res_blog['image']))?"<img  src='upload/".$res_blog['image']."'  class='media-object'>":"<img class='media-object' src='images/blog1.png'>";?>

             </a>
           </div>
           <div class="media-body">
            <h4 class="media-heading"><?php echo $res_blog['heading'];?></h4>
            <?php echo $res_blog['short_content'];?>
            <div class="row">
             <div class="col-md-6">
              <div class="post-date">
               Post Date: <span>21 Dec 19</span>
             </div>
           </div> 
           <div class="col-md-6">
            <div class="read-post">
             <span><a href="blogs/<?php echo $res_blog['slug'];?>">Read More...</a></span>
           </div>
         </div> 
       </div>
     </div>
   </div>
   <?php
 }
 ?>
 <div class="divider-post"></div>
</div>
<div class="col-md-4 about">
 <div class="latest-bg">
  <div class="heading-recent">Recent Blog </div>
  <div class="innet-text">
    <ul>
      <?php
      while($res_blog = fetchAssoc($select_blog1))
      {
        ?>
         <a href="blogs/<?php echo $res_blog['slug'];?>"><li><?php echo $res_blog['heading'];?></li></a>
        <?php
      }
      ?>
    </ul>
  </div> 
</div>
</div>
</div></div>
</section>


<!-- pagination start -->
<div class="container">
  <ul class="pagination">
    <li class="<?php if($_GET['page']==1){echo "disabled";}?>"><a href="?page=<?php echo $Previous; ?>">«</a></li>
    <?php for($i=1; $i<=$pages;$i++) :?>
    <li class="<?php if($_GET['page']==$i){echo "active";}?>"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?><span class="sr-only">(current)</span></a></li>
    <!-- <li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> -->
     <?php endfor; ?>
    <li class="<?php if($_GET['page']>=$pages){echo "disabled";}?>"><a href="?page=<?php echo $Next; ?>">»</a></li>
  </ul>
</div>
<!-- pagination end -->


<?php include('footer.php');?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>