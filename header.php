<?php

if(isset($_POST['login_submit']))
{
  $username = addslashes($_POST['username']);
  $password = addslashes($_POST['password']);

  if($username=="" or $password=="")
  {
   echo "<script type='text/javascript'>alert('please fill all the details');</script>";

 }else{

  $user_select = exeQuery("select * from ".TABLE_USER." where username='".$username."' and password='".$password."' and status=1 ");

  if($res_user = fetchAssoc($user_select))
  {
    $_SESSION['user_id'] = $res_user['id'];
        // header("location:index.php");
        // exit();
  }else{

    echo "<script type='text/javascript'>alert('incorrect user details');</script>";
  }
}
}

$select_user = exeQuery("select * from ".TABLE_USER." where id='".$_SESSION['user_id']."' and status=1 ");
$res_user = fetchAssoc($select_user);
?>
<?php
if($page=="blog-view.php" or $page=="membership.php" )
{
  ?>
  <div class="top-area">
    <div class="container">
      <div class="col-md-9 col-sm-9 col-xs-12"> 
        <div class="top-cont">
         <ul>
           <!-- <li><i class="fa fa-clock-o" aria-hidden="true"></i> Opening Time: Mon-Sun 08:00-20:00</li> --> 
           <li><i class="fa fa-envelope-o" aria-hidden="true"></i> info@orrishsociety.com</li>  
           <li><i class="fa fa-phone" aria-hidden="true"></i> +91-88774 55224</li>  
         </ul>
       </div> 
     </div>
     <div class="col-md-3 col-sm-3 col-xs-12">
      <div class="login-cont">
        <?php
        if($_SESSION['user_id']!="")
        {
          ?>
          <ul data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <li><a href="../profile.php">My Account</a></li> 
            <i class="fa fa-angle-down ml-2 opacity-8"></i>
          </ul> 
          <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
            <a  href="../profile.php" class="mylink">User Account</a>
            <!--   Setting>   -->           
            <div tabindex="-1" class="dropdown-divider"></div>
            <a href="../logout.php" class="mylink">Log Out</a>
          </div> 
          <?php
        }else{
          ?>
          <ul>
            <li><a href="#" onclick="show_login()">Login</a></li> |
            <li><a href="#" onclick="show_register()">Apply Now</a></li>  
          </ul>
          <?php
        }
        ?>
      </div>  
    </div>
  </div>  
</div>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="../images/logo.jpg"></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../about-us.php">About Us</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Delhi Smart City<span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><a href="sector-delineation-plan-zone-l.pdf" target="black">L-Zone Sector Plan</a></li>  
           <li role="separator" class="divider"></li>
           <li><a href="../location-advantage.php">Location Advantage</a></li>  
           <li role="separator" class="divider"></li>
           <li><a href="#">L-Zone Features </a></li>  
           <li role="separator" class="divider"></li>
           <li><a href="#">L-Zone Investment</a></li>  
           <li role="separator" class="divider"></li>
           <li><a href="../govt-approvals.php">Govt. Approvals</a></li>   
         </ul>           
       </li>
       <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Project<span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="../orrish-height.php">Orrish Height</a>

         </li>  
       </ul>           
     </li>
     <li><a href="#">Apply Online</a></li>
     <li><a href="../nri.php">NRI</a></li>
     <li><a href="../investor.php">Investor</a></li>
     <li><a href="../blog.php">Blog</a></li>
     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Download<span class="caret"></span></a>
      <ul class="dropdown-menu">
       <li><a href="">L-Zone</a> </li> 
       <li><a href="">Orrish Height</a> </li>  
     </ul>           
   </li> 

 </li>
 <li><a href="../contact-us.php">Contact Us</a></li>
</ul>
</div>
</div>
</nav>
<?php
}else{
  ?>
  <div class="top-area">
    <div class="container">
      <div class="col-md-9 col-sm-9 col-xs-12"> 
        <div class="top-cont">
         <ul>
           <!-- <li><i class="fa fa-clock-o" aria-hidden="true"></i> Opening Time: Mon-Sun 08:00-20:00</li> --> 
           <li><i class="fa fa-envelope-o" aria-hidden="true"></i> info@orrishsociety.com</li>  
           <li><i class="fa fa-phone" aria-hidden="true"></i> +91-88774 55224</li>  
         </ul>
       </div> 
     </div>
     <div class="col-md-3 col-sm-3 col-xs-12">
      <div class="login-cont">
        <?php
        if($_SESSION['user_id']!="")
        {
          ?>
          <ul data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <li><a href="profile.php">My Account</a></li> 
            <i class="fa fa-angle-down ml-2 opacity-8"></i>
          </ul> 
          <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
            <a  href="profile.php" class="mylink">User Account</a>
            <!--   Setting>   -->           
            <div tabindex="-1" class="dropdown-divider"></div>
            <a href="logout.php" class="mylink">Log Out</a>
          </div> 
          <?php
        }else{
          ?>
          <ul>
            <li><a href="#" onclick="show_login()">Login</a></li> |
            <li><a href="#" onclick="show_register()">Apply Now</a></li>  
          </ul>
          <?php
        }
        ?>
      </div>  
    </div>
  </div>  
</div>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="images/logo.jpg"></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li><a href="about-us.php">About Us</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Delhi Smart City<span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><a href="sector-delineation-plan-zone-l.pdf" target="black">L-Zone Sector Plan</a></li>  
           <li role="separator" class="divider"></li>
           <li><a href="location-advantage.php">Location Advantage</a></li>  
           <li role="separator" class="divider"></li>
           <li><a href="#">L-Zone Features </a></li>  
           <li role="separator" class="divider"></li>
           <li><a href="#">L-Zone Investment</a></li>  
           <li role="separator" class="divider"></li>
           <li><a href="govt-approvals.php">Govt. Approvals</a></li>   
         </ul>           
       </li>
       <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Project<span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="orrish-height.php">Orrish Height</a>

         </li>  
       </ul>           
     </li>
     <li><a href="#">Apply Online</a></li>
     <li><a href="nri.php">NRI</a></li>
     <li><a href="investor.php">Investor</a></li>
     <li><a href="blog.php">Blog</a></li>
     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Download<span class="caret"></span></a>
      <ul class="dropdown-menu">
       <li><a href="">L-Zone</a> </li> 
       <li><a href="">Orrish Height</a> </li>  
     </ul>           
   </li> 

 </li>
 <li><a href="contact-us.php">Contact Us</a></li>
</ul>
</div>
</div>
</nav>
<?php
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css"></script>
<style type="text/css">
  @import url(http://fonts.googleapis.com/css?family=Roboto);

  /****** LOGIN MODAL ******/
  .loginmodal-container {
    padding: 30px;
    max-width: 350px;
    width: 100% !important;
    background-color: #F7F7F7;
    margin: 0 auto;
    border-radius: 2px;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    font-family: roboto;
  }

  .loginmodal-container h1 {
    text-align: center;
    font-size: 1.8em;
    font-family: roboto;
  }

  .loginmodal-container input[type=button] {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    position: relative;
  }

  .loginmodal-container input[type=submit] {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    position: relative;
  }

  .loginmodal-container input[type=text],input[type=email],input[type=password] {
    height: 44px;
    font-size: 16px;
    width: 100%;
    margin-bottom: 10px;
    -webkit-appearance: none;
    background: #fff;
    border: 1px solid #d9d9d9;
    border-top: 1px solid #c0c0c0;
    /* border-radius: 2px; */
    padding: 0 8px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
  }

  .loginmodal-container input[type=text]:hover,input[type=email]:hover, input[type=password]:hover {
    border: 1px solid #b9b9b9;
    border-top: 1px solid #a0a0a0;
    -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  }

  .loginmodal {
    text-align: center;
    font-size: 14px;
    font-family: 'Arial', sans-serif;
    font-weight: 700;
    height: 36px;
    padding: 0 8px;
    /* border-radius: 3px; */
/* -webkit-user-select: none;
user-select: none; */
}

.loginmodal-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #4d90fe;
  padding: 17px 0px;
  font-family: roboto;
  font-size: 14px;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.loginmodal-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.loginmodal-container a {
  text-decoration: none;
  color: #666;
  font-weight: 400;
  text-align: center;
  display: inline-block;
  opacity: 0.6;
  transition: opacity ease 0.5s;
} 

.login-help{
  font-size: 12px;
}
</style>

<!-- MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="loginmodal-container">
      <h1>Login to Your Account</h1><br>
      <form action="" method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="login_submit" class="login loginmodal-submit" value="Login">
      </form>

      <div class="login-help">
        <a href="#" onclick="show_register()">Apply Online</a> - <a href="#" onclick="show_forget()">Forgot Password</a>
      </div>
    </div>
  </div>
</div>
<!-- MODAL LOGIN END -->

<!-- MODAL Register -->
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="loginmodal-container">
      <h1>Register</h1><br>
      <form action="" method="POST">
        <input type="text" id="rusername" name="user" placeholder="Name as per on Pancard">
        <input type="text" id="rphone" name="phone" placeholder="Phone">
        <input type="email" id="remail" name="email" placeholder="E-mail">
        <input type="button" onclick="register_user()" name="register" class="login loginmodal-submit" value="Register">
      </form>

      <div class="login-help">
        <a href="#" onclick="show_login()">Login</a>
      </div>
    </div>
  </div>
</div>
<!-- MODAL Register END -->


<!-- MODAL Otp -->
<div class="modal fade" id="otp-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="loginmodal-container">
      <h1> Please Enter Otp</h1><br>
      <form action="" method="POST">
        <input type="text" id="ophone" name="phone" placeholder="Phone Number">
        <input type="text" id="ootp" name="otp" placeholder="Otp">
        <input type="button" name="otp" onclick="register_verify()" class="login loginmodal-submit" value="Submit">
      </form>
    </div>
  </div>
</div>
<!-- MODAL Otp END -->

<!-- MODAL Otp -->
<div class="modal fade" id="forget-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="loginmodal-container">
      <h1>Foget Password</h1><br>
      <form action="" method="POST">
        <input type="text"  id="fphone" name="phone" placeholder="Phone Number">
        <input type="button" onclick="get_password()" class="login loginmodal-submit" value="Submit">
      </form>

      <div class="login-help">
        <a href="#" onclick="show_login()">Login</a> 
      </div>
    </div>
  </div>
</div>
<!-- MODAL Otp END -->

<script type="text/javascript">
  function show_login()
  {
    $('#login-modal').modal('show');
    $('#register-modal').modal('hide');
    $('#forget-modal').modal('hide');
  }

  function show_register(){
    $('#register-modal').modal('show');
    $('#login-modal').modal('hide');
  }

  function show_forget(){
    $('#forget-modal').modal('show');
    $('#login-modal').modal('hide');
  }

  function register_user(){

    var rusername = $('#rusername').val();
    var rphone = $('#rphone').val();
    var remail = $('#remail').val();

    $.ajax({
      type: "POST",
      url: "register.php",
      data: {'name':rusername,'email':remail,'phone':rphone},
      dataType: 'json',
      success: function(data)
      {
        if(data.type ==1){
         swal(data.msg);
       }else{

         $('#ophone').val(data.phone);
         $('#register-modal').modal('hide');
         $('#otp-modal').modal('show');
       }    
     },
     error: function (data)
     {
       swal("Something Went Wrong");
       return false;
     }

   });
  }

  function register_verify(){

    var ophone = $('#ophone').val();
    var ootp = $('#ootp').val();

    $.ajax({
      type: "POST",
      url: "verify.php",
      data: {'otp':ootp,'phone':ophone},
      dataType: 'json',
      success: function(data)
      {
        if(data.type ==1){
         swal(data.msg);
       }else{

        $('#otp-modal').modal('hide');
        $('#login-modal').modal('show');
      }    
    },
    error: function (data)
    {
     swal("Something Went Wrong");
     return false;
   }

 });
  }


  function get_password(){

    var fphone = $('#fphone').val();

    alert(fphone);

    $.ajax({
      type: "POST",
      url: "get_password.php",
      data: {'phone':fphone},
      dataType: 'json',
      success: function(data)
      {
        if(data.type ==1){
         swal(data.msg);
       }else{
        swal(data.msg);
      }    
    },
    error: function (data)
    {
     swal("Something Went Wrong");
     return false;
   }
 });
  }
</script>
