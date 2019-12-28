<?php

$select_admin = exeQuery("select * from ".TABLE_ADMIN." where status='1' and id='".$_SESSION['admin_id']."'");
$res_admin = fetchAssoc($select_admin);

$select_category=exeQuery("select * from ".TABLE_BLOG." where 1=1 ");
$count_blog = num_res($select_category);

$select_user=exeQuery("select * from ".TABLE_USER." where 1=1 ");
$count_user = num_res($select_user);

$select_package=exeQuery("select * from ".TABLE_PACKAGE." where 1=1 ");
$count_package = num_res($select_package);

$select_income=exeQuery("select sum(paid_amount) from ".TABLE_MEMBERSHIP." where status=1 and payment='done' ");
$count_income = fetchAssoc($select_income);

$select_membership=exeQuery("select m.*,u.*,p.*, m.id as mid, p.id as pid,u.id as uid,p.image as pimage,u.image as uimage from ".TABLE_MEMBERSHIP." as m left join ".TABLE_USER." as u on (m.member_id = u.id) left join ".TABLE_PACKAGE." as p on (p.id = m.property_id) where 1=1 ");
$count_membership = num_res($select_membership);
?>
<div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                   </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <?php echo ($res_admin['image']!="" and file_exists("../upload/".$res_admin['image']))?"<img  src='../upload/".$res_admin['image']."' width='42' class='rounded-circle' height='42'>":"<img width='42' class='rounded-circle' src='assets/images/avatars/1.jpg' alt='>";?>
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <a  href="manage-profile.php"><button type="button" class="dropdown-item">User Account</button></a>
                                          <!--   <button type="button" tabindex="0" class="dropdown-item">Settings</button>   -->           
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <a href="login.php"><button type="button" tabindex="0" class="dropdown-item">Log Out</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?php echo ucfirst($res_admin['username']);?>
                                    </div>
                                    <div class="widget-subheading">
                                       <?php echo ucfirst($res_admin['type']);?>
                                    </div>
                                </div>
                                <!-- <div class="widget-content-right header-user-info ml-3">
                                    <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div> -->
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div> 