<?php
include('library/raso_function.php');
$page = "";

if (isset($_POST['submit'])) {
  $captcha1=addslashes($_POST['captcha1']);
  $fname = addslashes($_POST['fname']);
  $mobile = addslashes($_POST['phone']);
  $email = addslashes($_POST['email']);
  $message1 = addslashes($_POST['message']);
  $project = addslashes($_POST['project']);

  if($_POST['captcha']!=null)
  {
    if($_POST['captcha'] == $captcha1) {

      $to = "info@orrishsociety.com";

      $subject = "No Reply - Orrishsociety Contact Us Page : " . $mobile;
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      $headers .= 'From:' .$fname."\r\n";


      $message = "

      <p>Name : " . $fname . "</p>
      <p>Email Address : " . $email . "</p>
      <p>Mobile : " . $mobile . "</p>
      <p>Message : " . $message1 . "</p>
      <p>Project : " . $project . "</p>
      ";

      $mail=mail($to, $subject, $message, $headers);

      if($mail)
      {
        $_SESSION['msg']="mail sent";
        header("Location:".$_SERVER[PHP_SELF]);
        exit();
      }else{
        $_SESSION['msg']="mail not sent";
      }
    }else
    {
      $_SESSION['msg']="please fill valid captcha";
    }
  }else{
    $_SESSION['msg']="Please fill captcha";
  }
}
?>
<!DOCTYPE html>
<html lang="eng">
<head>
  <meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable = no" name="viewport" />
  <title>Orrish Society | Contact Us</title>
  <script src="https://use.fontawesome.com/10df981e81.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/banner.css">
  <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/contact-us.css">
</head>

<?php include('header.php');?>

<div class="container-fluid padd">
<div class="about-banner">
 <img src="images/contact-us.jpg" class="img-responsive">
<div class="inner">Contact Us</div>
</div> 
</div>   
</div>    

<section id="contact">
      <div class="section-content">
        <h1 class="section-header">Get in <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Touch with us</span></h1>
        <?PHP
          if($_SESSION['msg']!="")
          {
        ?>
        <h3><?PHP ECHO $_SESSION['msg']; unset( $_SESSION['msg']);?></h3>
        <?PHP
          }
        ?>
      </div>
      <div class="contact-section">
      <div class="container">
        <form action="" method="POST">
          <div class="col-md-6 form-line">
              <div class="form-group">
                <label for="exampleInputUsername">Your Name</label>
                <input type="text" class="form-control" id="" name="name" placeholder=" Enter Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail">Email Address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder=" Enter Email id">
              </div>  
              <div class="form-group">
                <label for="telephone">Mobile No.</label>
                <input type="tel" name="phone" class="form-control" id="telephone" placeholder=" Enter 10-digit mobile no.">
              </div>
              <div class="form-group">
                <label for ="description"> Message</label>
                <textarea  class="form-control" name="message" id="description" placeholder="Enter Your Message"></textarea>
              </div>
              <?php
                    $captcha=mt_rand(1000,9999);
                    ?>

              <div class="form-group">
                <label for="telephone">Captcha Code</label>
                <input type="tel" name="captcha1" class="form-control" id="telephone" placeholder="" value="<?php echo $captcha;?>" readonly>
              </div>
              <div class="form-group">
                <label for="telephone">Enter Captcha</label>
                <input type="tel" name="captcha" class="form-control" id="telephone" placeholder="Enter Captcha">
              </div>
              <div>

                <button type="submit" name="submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
              </div>
            </div>
            <div class="col-md-6">
<h3>Corporate Office</h3>
<br>
<h4><i class="fa fa-map-marker" aria-hidden="true"></i>4th Floor, Nahar Tower, Near Shyam Mandir, Sector 23, Dwarka, Delhi, 110077 </h4>
<br>
<h4><i class="fa fa-phone" aria-hidden="true"></i> +91 8700412360</h4>
<br>
<h4><i class="fa fa-envelope-o" aria-hidden="true"></i> info@orrishsociety.com</h4>
<br>
<h4><i class="fa fa-chrome" aria-hidden="true"></i> www.orrishsociety.com</h4>
<h4></h4>
              
          </div>
        </form>
      </div>
    </section>

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14017.245097804867!2d77.044059!3d28.5604142!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf5271f79379c57e0!2sOrrish%20Land%20Development%20Society!5e0!3m2!1sen!2sin!4v1576964696897!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>



<?php include('footer.php');?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>