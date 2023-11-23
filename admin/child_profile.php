<?php
  include "../classes/userContr.classes.php";
  include "../includes/child_profile.inc.php";
  $userdata = new UserCntr();
  $user = $userdata->get_userdata();

if(isset($user)){
      
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
                    <h2>Child Profile</h2>
                    <div class="clearfix"></div>
                  </div>
                  <a href="add_child_profile.php" class="btn btn-sm btn-primary">Add Child Record</a>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">

                          <table id="datatable-keytable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Registration Date</th>
                                <th>Action</th>
                              </tr>
                            </thead>


                            <tbody>

                                  <?php
                                    if($child_profile->allChildProfile() == false){

                                    }
                                    else{
                                    foreach($child_profile->allChildProfile() as $child){ ?>
                                        <tr id="records_<?= $child['id'];?>">
                                        <td> <?= $child['first_name'].' '.$child['last_name'].' ,'.$child['middle_name'] ?></td>
                                        <td> <?= $child['address'] ?></td>
                                        <td> <?= date("M, d Y", strtotime( $child['dob'])); ?></td>
                                        <td> <?= ucfirst($child['gender']); ?></td>
                                        <td> <?= $child['created_at'] ?></td>
                                        <td><a href="edit_child_profile.php?id=<?= $child['id']; ?>"  class="btn btn-sm btn-warning" onclick="showChildProfile()" data-toggle="tooltip" data-placement="top" title="Show All Child Profile"><i class="fa fa-eye"></i></i></a> <button type="button" onclick="deleteProgram(<?= $child['id'];?>)" class="btn-sm btn-danger dlt_record" data-toggle="tooltip" data-placement="top" title="delete child record"><i class="fa fa-trash"></button></td>
                                    <?php  
                                    }
                                    }
                                  ?>
                              
                            </tbody>
                          </table>
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
                                          <div class="col">
                                                <div id="transaction_number"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Gender:
                                          <div class="col">
                                                <div id="purchase_created_at"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Ad Consent:
                                          <div class="col">
                                                <div id="expecting_amount"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Date of Birth:
                                          <div class="col">
                                                <div id="expecting_amount"></div>  
                                          </div>
                                      </div>
                                    </div>

                                    <div class="col-md-6">

                                      <div class="row mt-2">
                                                Height:
                                          <div class="col">
                                                <div id="purchase_compounded"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Weight:
                                          <div class="col">
                                                <div id="purchase_status"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Eye Color:
                                          <div class="col">
                                                <div id="purchase_status"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Hair Color:
                                          <div class="col">
                                                <div id="purchase_status"></div>  
                                          </div>
                                      </div>

                                    </div>

                                      <div class="col-md-6">

                                      <div class="row mt-2">
                                                Pastimes:
                                          <div class="col">
                                                <div id="purchase_compounded"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Talent/Hobbies:
                                          <div class="col">
                                                <div id="purchase_status"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Chores:
                                          <div class="col">
                                                <div id="purchase_status"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Child Sleeps ON:
                                          <div class="col">
                                                <div id="purchase_status"></div>  
                                          </div>
                                      </div>

                                    </div>

                                    <div class="col-md-6">

                                      <div class="row mt-2">
                                                Language Spoken:
                                          <div class="col">
                                                <div id="purchase_compounded"></div>  
                                          </div>
                                      </div>

                                      <div class="row mt-2">
                                                Has Account:
                                          <div class="col">
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
                                        <div class="col">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Family Income:
                                        <div class="col">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Family Involvement:
                                        <div class="col">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                              Walls:
                                        <div class="col">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                              Roof:
                                        <div class="col">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Floor:
                                        <div class="col">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>
                                  </div>

                                    <div class="col-md-6">
                                    <div class="row">
                                              Number of Beds:
                                        <div class="col">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Number of Persons:
                                        <div class="col">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              House Condition:
                                        <div class="col">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Ownership Status:
                                        <div class="col">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Cooking Facility:
                                        <div class="col">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Water Source:
                                        <div class="col">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Electricity:
                                        <div class="col">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Sanitary Facility:
                                        <div class="col">
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
                                        <div class="col">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              School Name:
                                        <div class="col">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              School Type:
                                        <div class="col">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Academic Year:
                                        <div class="col">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              School Transportation:
                                        <div class="col">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    
                                  </div>

                                    <div class="col-md-6">
                                    <div class="row">
                                              Time School Travels:
                                        <div class="col">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Recent Grade Level:
                                        <div class="col">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Current Grade Level:
                                        <div class="col">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Favorite School Subject:
                                        <div class="col">
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
                                        <div class="col">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Mother Absent?:
                                        <div class="col">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Mother Occupation:
                                        <div class="col">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Is Mother Guardian?:
                                        <div class="col">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                  </div>

                                  <div class="col-md-6">
                                    <div class="row">
                                              Father Name:
                                        <div class="col">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Father Absent?:
                                        <div class="col">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                             Father Occupation:
                                        <div class="col">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Is Father Guardian?:
                                        <div class="col">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                  </div>

                                    <div class="col-md-12 mt-4">
                                    <div class="row">
                                              Guardian Name:
                                        <div class="col">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                              Guardian Occupation:
                                        <div class="col">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                              Guardian Relationship:
                                        <div class="col">
                                              <div id="payment_image"></div>  
                                        </div>
                                    </div>


                                    <div class="row mt-5">
                                              Child Lives With:
                                        <div class="col">
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
                                        <div class="col">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Amount:
                                        <div class="col">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Method:
                                        <div class="col">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    
                                  </div>

                                    <div class="col-md-6">
                                    <div class="row">
                                              Receipt Date:
                                        <div class="col">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Uploaded Image:
                                        <div class="col">
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
                                        <div class="col">
                                              <div id="reference_number"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Amount:
                                        <div class="col">
                                              <div id="payment_amount"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                              Method:
                                        <div class="col">
                                              <div id="payment_method"></div>  
                                        </div>
                                    </div>

                                    
                                  </div>

                                    <div class="col-md-6">
                                    <div class="row">
                                              Receipt Date:
                                        <div class="col">
                                              <div id="date_purchased"></div>  
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                              Uploaded Image:
                                        <div class="col">
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
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
          console.log(id)
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
