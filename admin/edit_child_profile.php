<?php
  include "../classes/userContr.classes.php";
  include "../includes/child_profile.inc.php";
  $userdata = new UserCntr();
  $user = $userdata->get_userdata();

if(isset($user)){

  
  if(isset($_GET['id'])){
    $user_id = $_GET['id'];

    $child_profile_data = $child_profile->getChildData($user_id);
    $household = $child_profile->getChildDataHouseHold($user_id);


  }

      
  $name = ucfirst(ucfirst($user['full_name']));
  $username = $user['username'];
  $role = $user['role'];
  if(isset($role) == 'Admin'){


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>CIBI</title>
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
      body {
        background-color: #8c4c97;
      }
      .left_col .scroll-view{
        background-color: #8c4c97;
      }
      .site_title{
        background-color: #8c4c97;
      }
      .main_container{
        background-color: #8c4c97;
      }

    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><image src="../images/logo-purple.png" height="25" width="50"><span>CIBI</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu menu_fixed">
              <div class="menu_section">
                <h3>General</h3>
                <?php include_once("../includes/side_menu.php") ?>
              </div>
            

            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="../includes/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
                  
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

        <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                            <div class="x_title">
                              <h2>Basic Child Information</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <button type="button" class="btn btn-sm btn-primary" onclick="editChildProfile(<?= $user_id; ?>)"><i class ="fa fa-edit"></i></button>
                               <div class="x_content">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                      <div class="row">
                                                Full Name:  
                                           <div class="form-group">
                                                <div id="full_name"><b><?= $child_profile_data['first_name'].' '.$child_profile_data['last_name'];  ?></b></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Gender:
                                           <div class="form-group">
                                                <div id="gender"><b><?= $child_profile_data['gender']; ?></b></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Ad Consent:
                                           <div class="form-group">
                                                <div id="ad_consent"><b><?= $child_profile_data['ad_consent']; ?></b></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Date of Birth:
                                           <div class="form-group">
                                                <div id="dob"><b><?= date("M d, Y", strtotime($child_profile_data['dob'])); ?></b></div>  
                                          </div>
                                      </div>
                                    </div>

                                    <div class="col-md-6">

                                      <div class="row mt-2">
                                                Height:
                                           <div class="form-group">
                                                <div id="height"><b><?= $child_profile_data['height']; ?> cm</b></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Weight:
                                           <div class="form-group">
                                                <div id="weight"><b><?= $child_profile_data['weight']; ?> kg</b></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Eye Color:
                                           <div class="form-group">
                                                <div id="eye_color"><b><?= $child_profile_data['eye_color']; ?></b></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Hair Color:
                                           <div class="form-group">
                                                <div id="hair_color"><b><?= $child_profile_data['hair_color']; ?></b></div>  
                                          </div>
                                      </div>

                                    </div>

                                      <div class="col-md-6">

                                      <div class="row mt-2">
                                                Pastimes:
                                           <div class="form-group">
                                                <div id="past_times"><b><?= $child_profile_data['pastimes']; ?></b></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Talent/Hobbies:
                                           <div class="form-group">
                                                <div id="hobbies"><b><?= $child_profile_data['talent_hobbies']; ?></b></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Chores:
                                           <div class="form-group">
                                                <div id="chores"><b><?= $child_profile_data['chores']; ?></b></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Child Sleeps ON:
                                           <div class="form-group">
                                                <div id="child_sleeps"><b><?= $child_profile_data['child_sleeps_on']; ?></b></div>  
                                          </div>
                                      </div>

                                    </div>

                                    <div class="col-md-6">

                                      <div class="row mt-2">
                                                Language Spoken:
                                           <div class="form-group">
                                                <div id="language"><b><?= $child_profile_data['language_spoken']; ?></b></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Has Account:
                                           <div class="form-group">
                                                <div id="has_account"><?= $child_profile_data['has_account']; ?></div>  
                                          </div>
                                      </div>

                                     

                                      </div>
                                 </div>
                            </div> <div class="child_profile_button"></div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Household Information</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <button type="button" class="btn btn-sm btn-primary" onclick="editChildProfileHouseHold(<?= $user_id; ?>)"><i class ="fa fa-edit"></i></button>
                              <div class="col-md-12">
                                  <div class="col-md-6">
                                    <div class="row">
                                              Address:
                                         <div class="form-group">
                                              <div id="reference_number"><b><?= $household['address']; ?></b></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Family Income:
                                         <div class="form-group">
                                              <div id="payment_amount"><b><?= $household['income']; ?></b></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Family Involvement:
                                         <div class="form-group">
                                              <div id="payment_method"><b><?= $household['family_involvement']; ?></b></div>  
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                              Walls:
                                         <div class="form-group">
                                              <div id="payment_method"><b><?= $household['beds']; ?></b></div>  
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                              Roof:
                                         <div class="form-group">
                                              <div id="payment_method"><b><?= $household['no_of_persons']; ?></b></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Floor:
                                         <div class="form-group">
                                              <div id="payment_method"><b><?= $household['walls']; ?></b></div>  
                                        </div>
                                    </div>
                                  </div>

                                    <div class="col-md-6">
                                    <div class="row">
                                              Number of Beds:
                                         <div class="form-group">
                                              <div id="date_purchased"><b><?= $household['roof']; ?></b></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Number of Persons:
                                         <div class="form-group">
                                              <div id="payment_image"><b><?= $household['floor']; ?></b></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              House Condition:
                                         <div class="form-group">
                                              <div id="payment_image"><b><?= $household['house_condition']; ?></b></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Ownership Status:
                                         <div class="form-group">
                                              <div id="payment_image"><b><?= $household['ownership_status']; ?></b></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Cooking Facility:
                                         <div class="form-group">
                                              <div id="payment_image"><b><?= $household['cooking_facility']; ?></b></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Water Source:
                                         <div class="form-group">
                                              <div id="payment_image"><b><?= $household['water_source']; ?></b></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Electricity:
                                         <div class="form-group">
                                              <div id="payment_image"><b><?= $household['electricity']; ?></b></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Sanitary Facility:
                                         <div class="form-group">
                                              <div id="payment_image"><b><?= $household['sanitary_facility']; ?></b></div>  
                                        </div>
                                    </div>


                                  </div>
                               </div>
                            </div>
                          </div>
                        </div>



                        <div class="col-md-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>School Information</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <div class="col-md-12">
                                  <div class="col-md-6">
                                    <div class="row">
                                              Attends School?:
                                         <div class="form-group">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              School Name:
                                         <div class="form-group">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              School Type:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Academic Year:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              School Transportation:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    
                                  </div>

                                    <div class="col-md-6">
                                    <div class="row">
                                              Time School Travels:
                                         <div class="form-group">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Recent Grade Level:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Current Grade Level:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Favorite School Subject:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>


                                  </div>
                               </div>
                            </div>
                          </div>
                        </div>


                        <div class="col-md-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Family Information</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <div class="col-md-12">
                                  <div class="col-md-6">
                                    <div class="row">
                                              Mother Name:
                                         <div class="form-group">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Mother Absent?:
                                         <div class="form-group">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Mother Occupation:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Is Mother Guardian?:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                  </div>

                                  <div class="col-md-6">
                                    <div class="row">
                                              Father Name:
                                         <div class="form-group">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Father Absent?:
                                         <div class="form-group">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                             Father Occupation:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Is Father Guardian?:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                  </div>

                                    <div class="col-md-12 mt-4">
                                    <div class="row">
                                              Guardian Name:
                                         <div class="form-group">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                              Guardian Occupation:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                              Guardian Relationship:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>


                                    <div class="row mt-5">
                                              Child Lives With:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>



                                  </div>
                               </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Siblings</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <div class="col-md-12">
                                  <div class="col-md-6">
                                    <div class="row">
                                              Name:
                                         <div class="form-group">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Amount:
                                         <div class="form-group">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Method:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    
                                  </div>

                                    <div class="col-md-6">
                                    <div class="row">
                                              Receipt Date:
                                         <div class="form-group">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Uploaded Image:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>


                                  </div>
                               </div>
                            </div>
                          </div>
                        </div>


                        <div class="col-md-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Program Enrolled</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <div class="col-md-12">
                                  <div class="col-md-6">
                                    <div class="row">
                                              Reference Number:
                                         <div class="form-group">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Amount:
                                         <div class="form-group">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Method:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    
                                  </div>

                                    <div class="col-md-6">
                                    <div class="row">
                                              Receipt Date:
                                         <div class="form-group">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Uploaded Image:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>


                                  </div>
                               </div>
                            </div>
                          </div>
                        </div>


                      </div>               
                    </div>
                 </div>
                  </div>
                </div>
              </div>

            
            
        </div>
        <!-- /page content -->

        <div class="modal fade" id="add_child_record" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Child Record</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <a href="https://colorlib.com">CIBI</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    <div class="modal fade viewdetails" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Child Profile Details</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                            <div class="x_title">
                              <h2>Basic Child Information</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <button type="button" class="btn btn-sm btn-primary" ><i class ="fa fa-edit"></i></button>
                               <div class="x_content">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                      <div class="row">
                                                Full Name:
                                           <div class="form-group">
                                                <div id="transaction_number"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Gender:
                                           <div class="form-group">
                                                <div id="purchase_created_at"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Ad Consent:
                                           <div class="form-group">
                                                <div id="expecting_amount"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Date of Birth:
                                           <div class="form-group">
                                                <div id="expecting_amount"></div>  
                                          </div>
                                      </div>
                                    </div>

                                    <div class="col-md-6">

                                      <div class="row mt-2">
                                                Height:
                                           <div class="form-group">
                                                <div id="purchase_compounded"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Weight:
                                           <div class="form-group">
                                                <div id="purchase_status"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Eye Color:
                                           <div class="form-group">
                                                <div id="purchase_status"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Hair Color:
                                           <div class="form-group">
                                                <div id="purchase_status"></div>  
                                          </div>
                                      </div>

                                    </div>

                                      <div class="col-md-6">

                                      <div class="row mt-2">
                                                Pastimes:
                                           <div class="form-group">
                                                <div id="purchase_compounded"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Talent/Hobbies:
                                           <div class="form-group">
                                                <div id="purchase_status"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Chores:
                                           <div class="form-group">
                                                <div id="purchase_status"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Child Sleeps ON:
                                           <div class="form-group">
                                                <div id="purchase_status"></div>  
                                          </div>
                                      </div>

                                    </div>

                                    <div class="col-md-6">

                                      <div class="row mt-2">
                                                Language Spoken:
                                           <div class="form-group">
                                                <div id="purchase_compounded"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Has Account:
                                           <div class="form-group">
                                                <div id="purchase_status"></div>  
                                          </div>
                                      </div>

                                      </div>
                                 </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Household Information</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <div class="col-md-12">
                                  <div class="col-md-6">
                                    <div class="row">
                                              Address:
                                         <div class="form-group">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Family Income:
                                         <div class="form-group">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Family Involvement:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                              Walls:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                              Roof:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Floor:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>
                                  </div>

                                    <div class="col-md-6">
                                    <div class="row">
                                              Number of Beds:
                                         <div class="form-group">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Number of Persons:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              House Condition:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Ownership Status:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Cooking Facility:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Water Source:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Electricity:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Sanitary Facility:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>


                                  </div>
                               </div>
                            </div>
                          </div>
                        </div>



                        <div class="col-md-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>School Information</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <div class="col-md-12">
                                  <div class="col-md-6">
                                    <div class="row">
                                              Attends School?:
                                         <div class="form-group">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              School Name:
                                         <div class="form-group">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              School Type:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Academic Year:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              School Transportation:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    
                                  </div>

                                    <div class="col-md-6">
                                    <div class="row">
                                              Time School Travels:
                                         <div class="form-group">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Recent Grade Level:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Current Grade Level:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Favorite School Subject:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>


                                  </div>
                               </div>
                            </div>
                          </div>
                        </div>


                        <div class="col-md-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Family Information</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <div class="col-md-12">
                                  <div class="col-md-6">
                                    <div class="row">
                                              Mother Name:
                                         <div class="form-group">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Mother Absent?:
                                         <div class="form-group">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Mother Occupation:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Is Mother Guardian?:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                  </div>

                                  <div class="col-md-6">
                                    <div class="row">
                                              Father Name:
                                         <div class="form-group">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Father Absent?:
                                         <div class="form-group">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                             Father Occupation:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Is Father Guardian?:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                  </div>

                                    <div class="col-md-12 mt-4">
                                    <div class="row">
                                              Guardian Name:
                                         <div class="form-group">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                              Guardian Occupation:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                              Guardian Relationship:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>


                                    <div class="row mt-5">
                                              Child Lives With:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>



                                  </div>
                               </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Siblings</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <div class="col-md-12">
                                  <div class="col-md-6">
                                    <div class="row">
                                              Name:
                                         <div class="form-group">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Amount:
                                         <div class="form-group">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Method:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    
                                  </div>

                                    <div class="col-md-6">
                                    <div class="row">
                                              Receipt Date:
                                         <div class="form-group">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Uploaded Image:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>


                                  </div>
                               </div>
                            </div>
                          </div>
                        </div>


                        <div class="col-md-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Program Enrolled</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <div class="col-md-12">
                                  <div class="col-md-6">
                                    <div class="row">
                                              Reference Number:
                                         <div class="form-group">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Amount:
                                         <div class="form-group">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Method:
                                         <div class="form-group">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    
                                  </div>

                                    <div class="col-md-6">
                                    <div class="row">
                                              Receipt Date:
                                         <div class="form-group">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Uploaded Image:
                                         <div class="form-group">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>


                                  </div>
                               </div>
                            </div>
                          </div>
                        </div>


                      </div>               
                    </div>
                 </div>
              </div>
    </div>




          <div class="modal fade editChildProfiles" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form id="form-1" class="row row-cols-1 ms-5 me-5 needs-validation" method="POST" action="../includes/child_profile.inc.php" novalidate>
                  <input type="hidden" class="child_profile_id" name="child_profile_id" value="">

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="first_name" class="form-label">First name</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" value="" required>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="validationCustom02" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="last-name" name="last_name" value="" required>
                 
                    </div>

                     <div class="form-group col-md-12">
                        <label for="validationCustom02" class="form-label">Middle name</label>
                        <input type="text" class="form-control" name="middle_name" id="middle-name" value="" required>
                   
                    </div>

                     <div class="form-group col-md-12">
                        <label for="validationCustom02" class="form-label">Gender</label>
                          <div class="radio">
                              <label>
                                <input type="radio" class="flat" checked name="gender" value="male" > Male
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" class="flat" name="gender" value="female"> Female
                              </label>
                            </div>
                     </div>

                    <br>

                     <div class="form-group col-md-12">
                      <label for="validationCustom02" class="form-label">Ad Consent</label>
                        <div class="radio">
                            <label>
                              <input type="radio" class="flat" checked name="consent" value="yes"> Yes
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" class="flat" name="consent" value="no"> No
                            </label>
                          </div>
                     </div>

                     <div class="form-group col-md-12">
                      <label for="validationCustom02" class="form-label">Date of Birth</label>
                      <input type="date" class="form-control" id="e_dob" name="dob" value="" required>
                     
                    </div>

                     <div class="form-group col-md-12">
                      <label for="validationCustom02" class="form-label">Height</label>
                      <input type="number" class="form-control" name="height" id="e_height" value="" placeholder="cm" required>
                      
                    </div>

                     <div class="form-group col-md-12">
                      <label for="validationCustom02" class="form-label">Weight</label>
                      <input type="number" class="form-control" name="weight" id="e_weight" placeholder="kg" value="" required>
                     
                    </div>

                     <div class="form-group col-md-12">
                      <label for="validationCustom02" class="form-label">Eye Color</label>
                      <input type="text" class="form-control" name="eye_color" id="e_eye_color" value="" required>
                  
                    </div>

                     <div class="form-group col-md-12">
                      <label for="validationCustom02" class="form-label">Hair Color</label>
                      <input type="text" class="form-control" name="hair_color" id="e_hair_color" value="" required>
                   
                    </div>

                     <div class="form-group col-md-12" >
                      <label for="validationCustom02" class="form-label">Past Time</label>
                      <input type="text" class="form-control" name="past_time" id="e_past_times" value="" required>
                     
                    </div>

                     <div class="form-group col-md-12">
                      <label for="validationCustom02" class="form-label">Talents/Hobbies</label>
                      <input type="text" class="form-control" name="hobbies" id="e_hobbies" value="" required>
                 
                    </div>

                     <div class="form-group col-md-12">
                      <label for="validationCustom02" class="form-label">Chores</label>
                      <input type="text" class="form-control" name="chores" id="e_chores" value="" required>
                
                    </div>

                     <div class="form-group col-md-12">
                      <label for="validationCustom02" class="form-label">Child Sleeps on</label>
                      <input type="text" class="form-control" name="child_sleeps_on" id="e_child_sleeps_on" value="" required>
                
                    </div>

                     <div class="form-group col-md-12">
                      <label for="validationCustom02" class="form-label">Language Spoken</label>
                      <input type="text" class="form-control" name="language" id="e_language" value="" required>
                 
                    </div>
                    </div>
                    <button type="submit" name="btn_submit_edit" id="btn_submit_edit" class="btn btn-primary">Submit</button>
                  </form>
                    </div>
                  
                </div>
            </div>
        </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>


    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
        function showChildProfile(){
            $('.viewdetails').modal();
        }

        function editChildProfile(id){
              $.ajax({  
                type: "GET",  
                url: "../includes/child_profile.inc.php?child_profile="+id,  
                success: function(value) {  
                  response = JSON.parse(value);
                  $('.editChildProfiles').modal();
                  $('.child_profile_id').val(response[0].id)
                  $('#first_name').val(response[0].first_name);
                  $('#first_name').val(response[0].first_name);
                  $('#last-name').val(response[0].last_name);
                  $('#middle-name').val(response[0].middle_name);
                  $('#e_dob').val(response[0].dob);
                  $('#e_height').val(response[0].height);
                  $('#e_weight').val(response[0].weight);
                  $('#e_hair_color').val(response[0].hair_color);
                  $('#e_eye_color').val(response[0].eye_color);
                  $('#e_past_times').val(response[0].pastimes);
                  $('#e_hobbies').val(response[0].talent_hobbies);
                  $('#e_chores').val(response[0].chores);
                  $('#e_child_sleeps_on').val(response[0].child_sleeps_on);
                  $('#e_language').val(response[0].language_spoken);
                }
            });
        }

        function editChildProfileHouseHold($id){
          $.ajax({  
                type: "GET",  
                url: "../includes/child_profile.inc.php?child_profile_household="+id,  
                success: function(value) {  
                  response = JSON.parse(value);

                }
            });
        }
    </script>
	
  </body>
</html>
<?php
 }
 else{
    header('location: ../login.php');
 }
}
else{
  header('location: ../login.php');
}

?>
