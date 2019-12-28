<?php 
include("../library/raso_function.php");
unset($_SESSION['admin_id']);
unset($_SESSION['email']);

if(isset($_POST['forget']))
{
  $phone = $_POST['phone'];

  if($phone==""){
    
    $_SESSION['msg']="Please Enter Your Mobile Number";
  }else{

    $select_user=exeQuery("select * from ".TABLE_ADMIN." where phone='".$phone."' and status=1 ");

        if($res_user=fetchAssoc($select_user)){

        $_SESSION['msg']=forgetPasswordmobile($phone);
         header("Location: login.php");
         exit();
    }else{
        $_SESSION['msg']="invalid details!!";
    }

  }
}

if(isset($_POST['submit']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];

  if($email=="" or $password=="")
  {
    $_SESSION['msg']="Please fill all the fields";
  }else{
    $select_user=exeQuery("select * from ".TABLE_ADMIN." where email='".$email."' and password='".$password."' and status=1 ");

    if($res_user=fetchAssoc($select_user)){

      $_SESSION['admin_id']=$res_user['id'];
      $_SESSION['email']=$res_user['email'];
      header("location:index.php");
      exit();
    }else{
        $_SESSION['msg']="invalid details!!";
    }
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
    <style type="text/css">
        #myform{
            margin-top: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6" id="myform">
            <div class="main-card mb-3 card">
              <?php
                if($_SESSION['msg']!="")
                {
              ?>
              <h4><p class="text-center" style="color: red"><?php echo $_SESSION['msg'];unset($_SESSION['msg']);?></p></h4>
              <?php
                }
              ?>
              <div class="card-body">
                <h5 class="card-title">Login</h5>
                <form class="" action="" method="POST">
                  <?php if($_GET['forget']!="")
                  {?>
                  <input placeholder="Phone" type="text" class="mb-2 form-control-lg form-control" name="phone">
                  <button type="submit" name="forget" class="btn btn-outline-primary text-center">Login</button>
                  <a href="login.php">Login</a>
                  <?php
                    }else{
                  ?>
                   <input placeholder="E-mail" type="text" class="mb-2 form-control-lg form-control" name="email">
                  <input placeholder="Password" type="password" class="mb-2 form-control-lg form-control" name="password">
                  <button type="submit" name="submit" class="btn btn-outline-primary text-center">Login</button>
                  <a href="login.php?forget=1">Forget password</a>
                  <?php
                    }
                  ?>
              </form>
          </div>
      </div>
  </div>
  <div class="col-md-3">
  </div>
</div>
</div>
</body>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
