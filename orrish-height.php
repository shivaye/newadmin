<?php
include('library/raso_function.php');
$page = "";

$select_package = exeQuery("select * from ".TABLE_PACKAGE." where status=1 ");
?>
<!DOCTYPE html>
<html lang="eng">
<head>
  <meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable = no" name="viewport" />
  <title>Project  | Orrish Height</title>
  <script src="https://use.fontawesome.com/10df981e81.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/banner.css">
  <link rel="stylesheet" href="css/layout.css">
</head>

<?php include('header.php');?>

<div class="container-fluid padd">
<div class="about-banner">
 <img src="images/slider1.jpg" class="img-responsive">
<div class="inner">Orrish Height</div>
</div> 
</div>   
</div>    


<section class="section1">
<div class="container ">
<div class="row about-middle">
<div class="col-md-12"> <div class="tagline"><h1>Overview</h1></div> </div>
<div class="col-md-6">
 <p>The Orrish Heights is a majestic residential destination with more than 1000 acres of reserved green environment for those who are seeking for a Luxuriant Lifestyle. These nature friendly homes are fit for royalty to reside. The people who reside here enjoy all majestic pleasures that it caters effortlessly. The beauty of the residences that have been designed to provide comfort as well as elegant, luxurious, lavish and grand is that they can be enjoyed by dwellers of all age groups. The Orrish Heights can help you create wonderful memories with families and friends. The many recreational facilities provided by the Orrish Heights help the occupants beat stress and enjoy quality time and keep oneself healthy.
</p> 
</div>
<div class="col-md-6">
  <img src="images/orrish-height.jpg" class="img-responsive">
</div>
</div></div>
</section>


<section class="features-bg">
<div class="container ">
<div class="row about-middle">
<div class="col-md-12"> 
<div class="tagline"><h1>Features</h1></div> 
</div>
<div class="col-md-6">
<div class="features">
 <ul>
 <li>Fully self-sufficient township.</li>
 <li>8 kms from airport & 5 kms from M.G. Road (High Street).</li>
 <li>Located on Sector 54, Golf Course Road, Gurgaon.</li>
 <li>Easily accessible from important business centres of Delhi.</li>
 <li>Pollution free environment with Aravallis in the backdrop.</li>
 </ul> 
</div>
</div>
<div class="col-md-6">
<div class="features">
 <ul>
 <li>Wifi Zone | Signal Free Zone | Smart Traffic Management</li>
 <li>Smart Parking System | Censor Base System | Pod Taxi</li>
 <li>Tunnel Infrast | Cloud Server | Security Sestem</li>

 </ul> 
</div>
</div>
</div></div>
</section>


<section class="section1">
<div class="container ">
<div class="row about-middle">
<div class="col-md-12"> <div class="tagline"><h1>Location</h1></div> </div>
<div class="col-md-6">
<p>Indra Gandhi International Airport: 15 Min</p><br>
<p>Diplomatic Enclave - 2: 10 Min</p><br>
<p>India's Logest Golf Course : 10 Min</p><br>
<p>IICC (International Convention Centre - Aisa Largest Centre): 10 Min</p><br>
<p>International Footboll Stadium : 15 Min</p><br>
<p>International Cricket  Stadium : 10 Min</p><br>
<p>Dwarka Sub City : 8 Min</p><br>
<p>Dwarka Expressway (Indias First Urban Expressway) : 10 Min</p><br>
<p>AIIMS-II : 10 Min</p><br>
<p>KMP Expressway : 12 Min</p>

</div>
<div class="col-md-6">
  <img src="images/map.jpg" class="img-responsive">
</div>
</div></div>
</section>

<section class="layout">
<div class="container ">
<div class="row about-middle">
<div class="col-md-12"> 
<div class="tagline"><h1>Layout</h1></div> 
</div>
<?php
  while($res_package = fetchAssoc($select_package))
  {
?>
<div class="col-md-4">
<div class="inner-box">
<div class="picture">
 <?php echo ($res_package['image']!="" and file_exists("upload/".$res_package['image']))?"<img  src='upload/".$res_package['image']."'  class='img-responsive'>":"<img class='img-responsive' src='images/bhk2.png'>";?>
</div>
<div class="pre">
<h4><?php echo $res_package['title'];?></h4>
<p><?php echo $res_package['description'];?></p>
<div class="divi top-spc1"></div>
<div class="property-price clearfix">
<div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $res_package['location'];?></div>
<div class="price">Rs. <?php echo $res_package['price'];?></div>
</div>
</div>
<?php
  if($_SESSION['user_id']!="")
  {
?>
<a href="memberships/<?php echo $res_package['id'];?>"><div class="book">Book Now</div></a>
<?php
  }else{
?>
<div class="book" onclick="show_login()">Book Now</div>
<?php
  }
?>
</div>
</div>
<?php
}
?>
</div>
</section>

<section class="section1">
<div class="container ">
<div class="row about-middle">
<div class="col-md-12"> <div class="tagline"><h1>Location</h1></div> </div>
</div>
<div class="col-md-12">
  <img src="images/Orrish-Heights-Payment-Plan-1.jpg" class="img-responsive">
</div>
<div class="col-md-12">
  <h4>Terms & Conditions</h4> 
 <p>1. Society Membership fee will be charged in every finacial year until possession.</p> 
 <p>2. Car parking and government taxes such as GST, EDC, IDC & other levied by government will be chaged as per actual.</p>
<p>3. Construction Cost is tentative and will be payable as per actual at the time of construction and as per construction link plan finalised at the start of construction.</p>
<p>4. All cheques will be issued to "Orrish Land Development Society" Payable at Delhi.</p>
<p>5. Sizes may vary as per final approval of layout by Authority.</p>
<p>6. KYC must be fulfilled at all stages by members as per finally approved by society board.</p>
<p>7. Land cost is exclusive of GST charges if applicable.</p>
</div>
</div></div>
</section>


<section class="section1">
<div class="container ">
<div class="row about-middle">
</div>
<div class="col-md-2 col-md-offset-5">
  <img src="images/download-button.png" class="img-responsive">
</div>

</div></div>
</section>



<?php include('footer.php');?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>