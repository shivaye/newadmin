<?php
include('library/raso_function.php');
$page = "";

if (isset($_POST['submit'])) {
  $fname = addslashes($_POST['fname']);
  $mobile = addslashes($_POST['phone']);
  $email = addslashes($_POST['email']);


  $to = "info@orrishsociety.com";

  $subject = "No Reply -Orrishsociety index Page : " . $mobile;
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  $headers .= 'From:' .$fname."\r\n";

  $message = "

  <p>Name : " . $fname . "</p>
  <p>Email Address : " . $email . "</p>
  <p>Mobile : " . $mobile . "</p>
  ";

  $mail=mail($to, $subject, $message, $headers);

  if($mail)
  {
    $_SESSION['msg']="mail sent";
  }else{
    $_SESSION['msg']="mail not sent";
  }
}
?>
<!DOCTYPE html>
<html lang="eng">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
  
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable = no" name="viewport" />
  <title>Orrish Society</title>
  <script src="https://use.fontawesome.com/10df981e81.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/banner.css">
  <link rel="stylesheet" href="css/layout.css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  
</head>

<?php include('header.php');?>

<div class="my-carousel">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="item active"><img src="images/banner.jpg" alt="Image-1" style="width:100%;"></div>
      <div class="item"><img src="images/banner2.jpg" alt="Image-1" style="width:100%;"></div>
      <div class="item"><img src="images/banner3.jpg" alt="Image-1" style="width:100%;"></div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="fa fa-angle-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="fa fa-angle-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>    

<div class="panel-bg">
  <div class="panel panel-info" >
    <h4>Welcome To Your</h4>
    <h1>New Living!</h1>
    <?php
          if($_SESSION['msg']!="")
          {
        ?>
        <h4><?php ECHO $_SESSION['msg']; unset( $_SESSION['msg']);?></h4>
        <?php
          }
        ?>
    <br>
    <div style="padding-top:30px" class="panel-body" >
      <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
      <form id="loginform" class="form-horizontal" role="form" action="" method="POST">
        <div style="margin-bottom: 25px" class="input-group">
          <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
          <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="Email"></div>
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
            <input id="login-password" type="text" class="form-control" name="phone" placeholder="Phone No.">
          </div>
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input id="login-password" type="text" class="form-control" name="fname" placeholder="Full Name">
          </div>                                    
          <div style="margin-top:10px" class="form-group">
            <div class="col-sm-12 controls">
              <button type="submit"  id="btn-login" name="submit" class="btn btn-success">Schedule a visit  </button>
            </div>
          </div>
        </form>     
      </div>                     
    </div>  
  </div>

  <section class="section1">
    <div class="container top-spc4">
      <div class="row">
        <div class="col-md-12">	
          <div class="heading"><h1>What We Offer</h1></div>
          <div class="sub-heading"><h4>We Offers 2BHK, 3BHK and 4BHK luxurious and spacious apartments with so many different size options. The project is rich in aesthetics, designs and features and are well developed with style and basic convenience for modern living.</h4></div></div>

          <div class="col-sm-6 col-md-4">
            <div class="feature-box">
              <div class="cricle"><div class="icon"><img src="images/timely.jpg"> </div></div>
              <div class="text-heading">Timely Possession</div>
              <div class="text-sub">Meeting deadlines is a challenge we take on willingly! It's exactly why we deem it a major commitment to complete our each projects on schedule. </div>
<!--               <div class="read"><a href="">Read More</a></div>
 -->            </div>
          </div>

          <div class="col-sm-6 col-md-4">
            <div class="feature-box">
              <div class="cricle"><div class="icon"><img src="images/professionalism.jpg"> </div></div>
              <div class="text-heading">Professionalism</div>
              <div class="text-sub">committed to your comfort from start to finish, every step of the way. Our relationship with you begins the first time you walk through our doors. </div>
<!--               <div class="read"><a href="">Read More</a></div>
 -->            </div>
          </div>

          <div class="col-sm-6 col-md-4">
            <div class="feature-box">
              <div class="cricle"><div class="icon"><img src="images/quality.jpg"> </div></div>
              <div class="text-heading">Quality</div>
              <div class="text-sub">Maybe the most important difference is our homes themselves. One step inside a Orrish home gives you a lasting impression of quality. </div>
<!--               <div class="read"><a href="">Read More</a></div>
 -->            </div>
          </div>
        </div></div>
      </section>

      <section class="section2">
        <div class="section2-overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="leftbar"></div>
                <div class="leftside">
                  ORRISH SOCIETY<br>
                  <span>INSPIRING LUXURY AT AFFORDABLE PRICES</span>
                </div>
              </div>	
              <div class="col-md-6">
                <div class="rightside">
                 Creating spaces for wholesome living
, is the perfect example of the fast growing modern lifestyle that is predominant today and is quite necessary too. Offering 2 BHK and 3 BHK, 'Orrish' truly exemplifies the true meaning of the better life. Orrish is all about living life to innovate real estate.  <br><br>
                 Fast connectivity, modern facilities, resourcefulness of the place and the amenities, all define 'Orrish' in a manner which can outrace any other project.
               </div>
             </div>
           </div>	
         </div>	
       </div>	
     </section>

     <section>
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-3 padd">
            <div class="cours2" style="overflow:hidden;">
              <img class="hover" src="images/hover.jpg">
              <div class="cours3">
                <h2 style="text-align:left;margin-top:-6px;color:rgb(255,255,255); ">Hall</h2>
              </div>
            </div>
          </div>

          <div class="col-md-3 padd">
            <div class="cours2" style="overflow:hidden;">
              <img class="hover" src="images/hover2.jpg">
              <div class="cours3">
                <h2 style="text-align:left;margin-top:-6px;color:rgb(255,255,255);">Living Room</h2>
              </div>
            </div>
          </div>

          <div class="col-md-3 padd">
            <div class="cours2" style="overflow:hidden;">
              <img class="hover" src="images/hover3.jpg">
              <div class="cours3">
                <h2 style="text-align:left;margin-top:-6px;color:rgb(255,255,255);">Bedroom</h2>
              </div>
            </div>
          </div>

          <div class="col-md-3 padd">
            <div class="cours2" style="overflow:hidden;">
              <img class="hover" src="images/hover4.jpg">
              <div class="cours3">
                <h2 style="text-align:left;margin-top:-6px;color:rgb(255,255,255);">Kitchen</h2>
              </div>
            </div>
          </div>
        </div>
      </div>	
<!--     </section>
    <div class="clr"></div>
    <div class="feature-box2-bg">
      <section class="section1">
        <div class="container top-spc4">
          <div class="row">
            <div class="col-md-12">	
              <div class="heading"><h1>Our Features</h1></div>
              <div class="sub-heading"><h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>
              Lorem Ipsum has been the industry's standard.</h4></div></div>

              <div class="col-sm-6 col-md-4">
                <div class="feature-box2">
                  <div class="image-box"><img src="images/banner.jpg"></div>	
                  <div class="text-sub2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </div>
                  <div class="read"><a href="">Read More</a></div>
                </div>
              </div>

              <div class="col-sm-6 col-md-4">
                <div class="feature-box2">
                  <div class="image-box"><img src="images/banner.jpg"></div>	
                  <div class="text-sub2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </div>
                  <div class="read"><a href="">Read More</a></div>
                </div>
              </div>

              <div class="col-sm-6 col-md-4">
                <div class="feature-box2">
                  <div class="image-box"><img src="images/banner.jpg"></div>	
                  <div class="text-sub2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </div>
                  <div class="read"><a href="">Read More</a></div>
                </div>
              </div>
            </div></div></div>
          </section> -->
        </div>

<!--         <section class="section4">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="row">	
                  <div class="col-md-12 padd">	
                    <div class="leftside">
                      <div class="leftbar"></div>
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                      <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    </div>
                  </div>
                  <div class="col-md-12 padd"><div class="pic"><img src="images/video.jpg" class="img-responsive"></div></div>
                </div></div>	
                <div class="col-md-6">
                  <div class="row padd">
                    <div class="col-md-4 padd">
                      <div class="right-box colour1">	
                        <div class="colour1"></div>	
                        <h3><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Lorem Ipsum </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                    </div>	

                    <div class="col-md-4 padd">
                      <div class="right-box colour1">	
                        <div class="colour1"></div>	
                        <h3><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Lorem Ipsum </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                    </div>	

                    <div class="col-md-4 padd">
                      <div class="right-box colour1">	
                        <div class="colour1"></div>	
                        <h3><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Lorem Ipsum </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                    </div>	

                    <div class="col-md-4 padd">
                      <div class="right-box colour1">	
                        <div class="colour1"></div>	
                        <h3><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Lorem Ipsum </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                    </div>	

                    <div class="col-md-4 padd">
                      <div class="right-box colour1">	
                        <div class="colour1"></div>	
                        <h3><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Lorem Ipsum </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                    </div>	

                    <div class="col-md-4 padd">
                      <div class="right-box colour1">	
                        <div class="colour1"></div>	
                        <h3><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Lorem Ipsum </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                    </div>	

                  </div>	
                </div>
              </div>	
            </div>
          </section> -->

          <section class="top-spc8">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <iframe width="500" height="500" src="https://www.youtube.com/embed/uEeuGlsgBqQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                  
                  </iframe>
                </div>
                <div class="col-md-6 shdw">
                    <div class="row">
                      <div class="col-sm-12">
                        <h3>Dwarka L-Zone</h3>
                        New housing project Victorian Privilege is located in L Zone Dwarka.
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="box top-spc4"><img src="images/l-zone.jpg" class="img-responsive"></div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </section>

         <section>
<div class="container-fluid padd top-spc4">
           <div class="payment-box">
            <div class="inner">
              <h1 class="text-center" style="color: #fff;">Apply Online <i class="fa fa-long-arrow-right"></i></h1>
            </div>
          </div>
</div>


        </section>
<!-- <div class="container top-spc4">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 text-center">
        <h3 ><strong>Testimonial</strong></h3>
      <div class="seprator"></div> 
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active">
                  <div class="row" style="padding: 20px">
                
                    <p class="testimonial_para">Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo en.</p><br>

                  </div>
                </div>
               <div class="item">
                   <div class="row" style="padding: 20px">
                    <p class="testimonial_para">Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo en.</p><br>

                  </div>
                </div>
              </div>
            </div>
             <div class="controls testimonial_control pull-right">
                <a class="left fa fa-chevron-left btn btn-default testimonial_btn" href="#carousel-example-generic"
                  data-slide="prev"></a>

                <a class="right fa fa-chevron-right btn btn-default testimonial_btn" href="#carousel-example-generic"
                  data-slide="next"></a>
              </div> 
        </div>
  </div>
</div> -->

<?php include('footer.php');?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
