
<?php
  include "../classes/userContr.classes.php";
  include "../includes/programs.inc.php";
  include "../classes/events.classes.php";
  include "../classes/events-contr.classes.php";

  $events =  new EventsCntrl();
  $date = new DateTime();
  $userdata = new UserCntr();
  $user = $userdata->get_userdata();
  $new_date =  $date->format('Y-m-d');
  $sd = $events->getEvents($new_date);

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
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
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
                   <div class="card card-primary">
                      <div class="card-header"><h3>Events Today <?= $date->format('M d Y'); ?></h3> 
                      </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Event Name</th>
                              <th>Event Description</th>
                              <th>Time</th>
                            </tr>
                          </thead>


                          <tbody>
                          
                            <?php
                                if($sd == false){
                                    
                                }
                                else{
                                foreach($sd as $sm){ ?>
                                    <tr id="data_<?= $sm['id'];?>">
                                      <td><a href="#" onclick="openModal(<?= $sm['id'];?>)"> <?= $sm['program_name']; ?>   </a></td>
                                      <td> <?= $sm['program_description']; ?></td>
                                      <td> <?= $sm['event_time'];  ?></td>
                                    
                                    </tr>
                                  <?php  
                                  }
                                  }
                              ?>
                          </tbody>
                        </table>
                    </div>
                <!-- <div class="col col-md-6">
                   
                </div> -->
            </div>
          </div>
        </div>
        <!-- /page content -->

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

    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-center text-secondary text-uppercase mb-0">Attendance</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fa fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                
                                    <?= $date->format('M d Y'); ?>
                              
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div id="reader" width="60px"></div>
                                            <div class="alert alert-success alert-dismissible" id="alertSuccess">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="icon fas fa-check"></i> Attendance Added!
                                            </div>
                                            <div class="alert alert-danger alert-dismissible" id="alertError">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="icon fas fa-ban"></i> Error!
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" name="program_id" id="program_id" readonly="" placeholder="scan qr code" class="form-control">
                                        <table id="tblattendance" class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Time</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if($getAttendance == false){

                                                    }
                                                    else{
                                                        foreach($getAttendance as $attendance){ ?>
                                                        <tr id="attendanceID">
                                                            <td><?= $attendance['fname'].' '.$attendance['lname']; ?></td>
                                                            <td><?= $attendance['state']; ?></td>
                                                            <td><?= $attendance['record']; ?></td>
                                                        </tr>
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	<script>
    var asd
      $("#alertError").hide();
      $("#alertSuccess").hide();
      function openModal(id){
       asd = $('#program_id').val(id)
        $('#portfolioModal1').modal()
      }
      function onScanSuccess(decodedText, decodedResult) {
        var sound = new Audio("../includes/barcode.wav");
        // handle the scanned code as you like, for example:
        console.log(`Code matched = ${decodedText}`, decodedResult);

       
        getStudentRecord(decodedText, asd);
       
        sound.play();
        html5QrcodeScanner.pause().then(_ => {
            // the UI should be cleared here    
        }).catch(error => {
            // Could not stop scanning for reasons specified in `error`.
            // This conditions should ideally not happen.
        });

    

        }

        function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning
             console.warn(`Barcode error = ${error}`);
        }


        var config = {
        fps: 10,
        qrbox: {width: 600, height: 600},
        rememberLastUsedCamera: true,
        // Only support camera scan type.
        supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
        };

        let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", config, /* verbose= */ false);

        html5QrcodeScanner.render(onScanSuccess);

        function getStudentRecord(id, asd){
          var status = id.substring(0,2); 
          // var con = document.getElementById('program_id').value=content;
          // console.log(con)
          console.log(asd)
            // if(status == 'in'){
            // $.ajax({
            //     method: "post",
            //     dataType: "json",
            //     url: "../includes/child_account.inc.php",
            //     data: {
            //     user_id: id.substring(2),
            //     status: 'time_in',
            //     timestamp: id
            //     },
            //     cache: false,
            //     success: function(response){
            //         $.each(response, function(index, data) {
            //             if (data == 404) {
            //                     $("#alertError").show()
            //                     setTimeout(function() {
            //                     $("#alertError").hide();
            //                     }, 5000);
            //             } else {
            //                     $("#alertSuccess").show()
            //                     setTimeout(function() {
            //                     $("#alertSuccess").hide();
            //                     }, 5000);
            //                     console.log(data);
            //                     $('#tblattendance').prepend('<tr><td>' + data.fname +' '+ data.lname + '</td>' + '<td>' + data.dept_name + '</td>' + '<td>' + data.state + '</td>' + '<td>' + data.record + '</td></tr>');
            //             }
            //         });
            //     }
            // })
            // }
            // else{
            //   $.ajax({
            //         method: "post",
            //         dataType: "json",
            //         url: "../includes/child_account.inc.php",
            //         data: {
            //         user_id: id.substring(2),
            //         status: 'time_out',
            //         timestamp: id
            //         },
            //         cache: false,
            //         success: function(response){
            //             $.each(response, function(index, data) {
            //                 if (data == 404) {
            //                         $("#alertError").show()
            //                         setTimeout(function() {
            //                         $("#alertError").hide();
                                
            //                         }, 5000);
            //                 } else {
            //                         $("#alertSuccess").show()
            //                         setTimeout(function() {
            //                         $("#alertSuccess").hide();
            //                         }, 5000);
            //                         console.log(data);
            //                         $('#tblattendance').prepend('<tr><td>' + data.fname +' '+ data.lname + '</td>' + '<td>' + data.dept_name + '</td>' + '<td>' + data.state + '</td>' + '<td>' + data.record + '</td></tr>');
            //                 }
            //             });
                       
            //         }
            //       })
            // }
            
        }

        function timeInterval() {
            html5QrcodeScanner.resume();
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