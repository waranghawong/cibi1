<?php
  include "../classes/userContr.classes.php";
  include "../includes/calendar.php";
  include "../includes/scheduler.inc.php";
  

  $userdata = new UserCntr();
  $user = $userdata->get_userdata();


  $calendar = new Calendar();

  $color = array("red","green","blue","yellow");
  $random_keys=array_rand($color,count($sched->getEvents()));
  foreach($sched->getEvents() as $key => $rm){

    $calendar->add_event($rm['program_name'], $rm['date'], $rm['no_of_days'], $color[]);

  }

    
    




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
    <link rel="stylesheet" href="../vendors/calendar/calendar.css">
	
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
                <h2><?= $name; ?></h2>
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
                    <img src="images/img.jpg" alt=""><?= $name; ?>
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
                    <h2>Scheduler</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                          <button type="button" class="btn btn-outline-primary btn-flat" data-toggle="modal" data-target=".add_schedule">Add Schedule</button>
                          <button type="button" data-toggle="modal" data-target="#calendar-modal" class="btn btn-outline-success btn-flat"><i class="fas fa-calendar-alt"> </i>Calendar</button>
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th>Schedule Name</th>
                                      <th>Schedule Category</th>
                                      <th>Date</th>
                                      <th>Time</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>


                                  <tbody>
                                  
                                    <?php
                                        if($sched->getSchedules() == false){
                                            
                                        }
                                        else{
                                        foreach($sched->getSchedules() as $sd){ ?>
                                            <tr id="data_<?= $sd['id'];?>">
                                              <td> <?= $sd['schedule_name']; ?></td>
                                              <td> <?= $sd['schedule_category']; ?></td>
                                              <td> <?= $sd['date'];  ?></td>
                                              <td> <?= $sd['time'];  ?></td>
                                              <td><button type="button" class="btn btn-sm btn-success"  onclick="editSchedule(<?= $sd['id'];?>)"><i class="fa fa-pencil"></i></button><button type="button" class="btn btn-sm btn-danger"  onclick="deleteSchedule(<?= $sd['id'];?>)"><i class="fa fa-trash"></i></button></td>
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
        <!-- /page content -->

        <div class="modal fade add_schedule" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Schedule</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="../includes/scheduler.inc.php">
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="text" name="schedule_name" class="form-control has-feedback-left" id="schedule_name" placeholder="schedule name">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
										 </div>
                     <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <textarea name="schedule_type" class="form-control has-feedback-left" id="schedule_type" placeholder="schedule category"></textarea>
                        <span class="fa fa-list-ul form-control-feedback left" aria-hidden="true"></span>
										 </div>
                     <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="date" name="schedule_date" class="form-control has-feedback-left" id="schedule_date" placeholder="schedule category">
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
										 </div>
                     <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="time" name="schedule_time" class="form-control has-feedback-left" id="schedule_time" placeholder="schedule category">
                        <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
										 </div>
                    <!-- <div class="form-row col-md-6">
                            <input type="file" name="item_photo" value=""  onchange="loadFile(event)">
                    </div>
                    <div class="form-row col-md-6 ">
                        <img id="preview" src="#" />
                    </div> -->
                 
                </div>
                <div class="modal-footer justify-content-center">
                  <button type="submit" name="btn_submit_account_method" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>


        <!-- edit schedule -->

        <div class="modal fade edit_schedule" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Schedule</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="../includes/scheduler.inc.php">
                   <input type="hidden" name="edit_schedule_id" id="edit_schedule_id">
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="text" name="edit_schedule_name" class="form-control has-feedback-left" id="edit_schedule_name" placeholder="schedule name">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
										 </div>
                     <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <textarea name="edit_schedule_type" class="form-control has-feedback-left" id="edit_schedule_type" placeholder="schedule category"></textarea>
                        <span class="fa fa-list-ul form-control-feedback left" aria-hidden="true"></span>
										 </div>
                     <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="date" name="edit_schedule_date" class="form-control has-feedback-left" id="edit_schedule_date" placeholder="schedule category">
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
										 </div>
                     <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="time" name="edit_schedule_time" class="form-control has-feedback-left" id="edit_schedule_time" placeholder="schedule category">
                        <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
										 </div>
                    <!-- <div class="form-row col-md-6">
                            <input type="file" name="item_photo" value=""  onchange="loadFile(event)">
                    </div>
                    <div class="form-row col-md-6 ">
                        <img id="preview" src="#" />
                    </div> -->
                 
                </div>
                <div class="modal-footer justify-content-center">
                  <button type="submit" name="btn_edit_submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>


        <div class="modal fade" id="calendar-modal" style="display: none;" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Calendar of Events</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                    <div class="modal-body">
                    
                        <?=$calendar?>
                    
                    </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
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
      function editSchedule(id){
            $.ajax({
                method: "get",
                dataType: "json",
                url: "../includes/scheduler.inc.php?id=" + id,
                success: function (response){
                $.each(response, function(index, data) {
                  console.log(data);
                        $('#edit_schedule_id').val(data.id)
                        $('#edit_schedule_name').val(data.schedule_name)
                        $('#edit_schedule_type').val(data.schedule_category)
                        $('#edit_schedule_date').val(data.date)
                        $('#edit_schedule_time').val(data.time)
                        $('.edit_schedule').modal();
                    });
                }
               
            })
            $('#student_id').val(id);
            $('#editStudent').modal(); 
        }

        function deleteSchedule(id){
            var confirmation = confirm("are you sure you want to remove the item?");

            if(confirmation){
                $.ajax({
                    method: "get",
                    url: "../includes/scheduler.inc.php?delete_sched=" + id,
                    success: function (response){
                    $("#data_"+id).remove();
                    }
                })
            }
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
