
<?php
  include "../classes/userContr.classes.php";
  include '../includes/event.inc.php';
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


        <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><?= date("F d, Y"); ?></h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card card-primary">
                      <div class="card-header">
                      </div>
                      <form method="POST" action="../includes/event.inc.php">
                        <div class="card-body">
                          <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 ">Program Name</label>
                                <select class="form-control" name="program_value">
                                  <?php 
                                    foreach($events->getPrograms() as $programs){
                                  ?>
                                  <option value="<?= $programs['id'] ?>"><?= $programs['program_name'] ?></option>
                                  <?php } ?>
                                </select>
                          </div>
                          <div class="form-group">
                            <label for="lastName">Program Description</label>
                            <textarea  value="" name="event_description" class="form-control" id="event_description"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="lastName">Date</label>
                            <input type="text" readonly="readonly" value="<?php  echo $new_date; ?>" name="event_date" class="form-control" id="apptDate">
                          </div>
                          <div class="form-group">
                            <label for="lastName">Time</label>
                            <input type="time" value="" name="event_time" class="form-control" id="event_time">
                          </div>
                          <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 ">No of days</label>

                          <select  class="form-control" name="no_days" id="exampleSelectBorder">
                          <?php
                            for($i=1; $i<=7; $i++){
                              echo "<option>".$i."</option>";
                            }
                          
                          ?>
                        
                    
                        </select>
                          </div>
                        <div class="card-footer">
                          <button type="submit" name="add_event" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>

                    <div class="card card-primary">
                      <div class="card-header">
                      </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Event Name</th>
                              <th>Event Description</th>
                              <th>No. of days</th>
                              <th>Time</th>
                              <th>Action</th>
                            </tr>
                          </thead>


                          <tbody>
                          
                            <?php
                                if($sd == false){
                                    
                                }
                                else{
                                foreach($sd as $sm){ ?>
                                    <tr id="data_<?= $sm['id'];?>">
                                      <td> <?= $sm['program_name']; ?></td>
                                      <td> <?= $sm['program_description']; ?></td>
                                      <td> <?= $sm['no_of_days'];  ?></td>
                                      <td> <?= $sm['event_time'];  ?></td>
                                      <td><button type="button" class="btn btn-sm btn-success"  onclick="editSchedule(<?=  $sm['id'];?>)"><i class="fa fa-pencil"></i></button><button type="button" class="btn btn-sm btn-danger"  onclick="deleteSchedule(<?=  $sm['id'];?>)"><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                  <?php  
                                  }
                                  }
                              ?>
                          </tbody>
                        </table>
                    </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
              
            </div>
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
                url: "../includes/event.inc.php?id=" + id,
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
                    url: "../includes/event.inc.php?delete_event=" + id,
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