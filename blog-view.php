<?php
include('library/raso_function.php');
$page = "blog-view.php";

$select_blog = exeQuery("select * from ".TABLE_BLOG." where status=1 and slug='".$_GET['blog_id']."' ");

$res_blog1 = fetchAssoc($select_blog);

$select_blog1 = exeQuery("select * from ".TABLE_BLOG." order by id desc limit 6"); 

?>
<!DOCTYPE html>
<html lang="eng">
<head>
  <meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable = no" name="viewport" />
  <title>Orrish Society | Blog</title>
  <script src="https://use.fontawesome.com/10df981e81.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/menu.css">
  <link rel="stylesheet" href="../css/banner.css">
  <link rel="stylesheet" href="../css/layout.css">
</head>

<?php include('header.php');?>

<div class="container-fluid padd">
<div class="about-banner">
    <div col-md-12>
 <img src="../images/about-us-banner.jpg" class="img-responsive">
 </div>
<div class="inner">Blog & News</div>
</div> 
</div>   
</div>    


<section class="section1">
<div class="container ">
<div class="row about-middle">
<div class="col-md-12 bott-spc2"> <div class="postheading"><h1><?php echo $res_blog1['heading'];?></h1></div> </div>
<div class="col-md-8">
<div class="post-view">
  <img class='img-responsive' src="<?php echo "../upload/".$res_blog1['image']?>">
 <p><?php echo $res_blog1['content'];?>
</p>
<!-- <p><span>Source From: https://epaper.jagran.com/epaper/19-dec-2019-262-national-edition-national-page-2.html#</span></p> -->
</div>



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
        <a href="../blogs/<?php echo $res_blog['slug'];?>"><li><?php echo $res_blog['heading'];?></li></a>
        <?php
      }
      ?>
    </ul>
  </div> 
 </div>
</div>
</div></div>
</section>





<?php include('footer.php');?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>