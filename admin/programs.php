<?php
  include "../classes/userContr.classes.php";
  include "../includes/programs.inc.php";
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

        <div class="right_col" role="main">
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>CIBI Programs</h2>
                <div class="clearfix"></div>
              </div>
              <button type="button" data-toggle="modal" data-target=".addProgram" class="btn btn-sm btn-primary">Add Program</button>
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">

                      <table id="datatable-keytable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>Program Name</th>
                            <th>Program Description</th>
                            <th>Tags</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                            

                        <tbody>
                                  <?php
                                    if($programs->getProgram() == false){

                                    }
                                    else{
                                    foreach($programs->getProgram() as $program_list){ ?>
                                        <tr id="records_<?= $program_list['id'];?>">
                                        <td> <?= $program_list['program_name']; ?></td>
                                        <td> <?= $program_list['program_description']; ?></td>
                                        <td> <?= $program_list['tags']; ?></td>
                                        <td><button type="button" data-toggle="tooltip" data-placement="top" title="edit" onclick="editProgram(<?= $program_list['id'];?>)" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></button> <button type="button" onclick="deleteProgram(<?= $program_list['id'];?>)" class="btn-sm btn-danger dlt_record" data-toggle="tooltip" data-placement="top" title="delete subject"><i class="fa fa-trash"></button></td>
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

         <!-- Add Program Modal -->
         <div class="modal fade addProgram" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Program<i class="fa fa-heart"></i></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="../includes/programs.inc.php">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputAddress2">Program Name</label>
                                    <input type="text" class="form-control" name="program_name" id="phone">
                                </div>   
                                <div class="form-group col-md-12">
                                    <label for="inputAddress2">Program Description</label>
                                    <textarea type="text" class="form-control" name="program_description" id="phone"></textarea>
                                </div> 

                                <div class="form-group col-md-12">
                                  <label class="control-label col-md-3 col-sm-3 ">Input Tags</label>
                                  <div class="col-md-9 col-sm-9 ">
                                    <input id="tags_1" name="program_tags" type="text" class="tags form-control" value="health, 4-18 years old, elementary" />
                                  </div>
                                </div>


                                <div class="form-group col-md-12">
                                    <button type="submit" name="submit" id="btn_submit" class="btn btn-primary">Submit</button>
                                </div>
                              </div>
                                    
                          
                        </form>
                    </div>
                  
                </div>
            </div>
        </div>


           <!-- Edit Program Modal -->
           <div class="modal fade editProgram" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Program<i class="fa fa-heart"></i></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="../includes/programs.inc.php">
                          <input type="text" id="edit_program_id" name="edit_program_id" value="">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputAddress2">Program Name</label>
                                    <input type="text" class="form-control" name="edit_program_name" id="edit_program_name">
                                </div>   
                                <div class="form-group col-md-12">
                                    <label for="inputAddress2">Program Description</label>
                                    <textarea type="text" class="form-control" name="edit_program_description" id="edit_program_description"></textarea>
                                </div> 

                                <div class="form-group col-md-12">
                                  <label class="control-label col-md-3 col-sm-3 ">Input Tags</label>
                                  <div class="col-md-9 col-sm-9 ">
                                    <input id="tags_2"  data-role="tagsinput" name="edit_program_tags" class="tags form-control"  />
                                  </div>
                                </div>


                                <div class="form-group col-md-12">
                                    <button type="submit" name="btn_submit_edit" id="btn_submit_edit" class="btn btn-primary">Submit</button>
                                </div>
                              </div>
                                    
                          
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
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script>
       function deleteProgram(id){
            var confirmation = confirm("are you sure you want to remove the item?");

            if(confirmation){
                $.ajax({
                    method: "get",
                    url: "../includes/programs.inc.php?delete_program=" + id,
                    success: function (response){
                    $("#records_"+id).remove();
                    }
                })
            }
        }

        function editProgram(id){
            $.ajax({
                method: "get",
                dataType: "json",
                url: "../includes/programs.inc.php?programid=" + id,
                success: function (response){
                $.each(response, function(index, data) {
                  console.log(data);
                        $('#edit_program_id').val(id)
                        $('#edit_program_name').val(data.program_name)
                        $('#edit_program_description').val(data.program_description)
                        // $('#edit_program_tags').val(data.tags)
                        $('.editProgram').show();
                        $('#tags2').tagsinput('add',data.tags);
                 
                    });
                }
            })
            // $('#prof_uid').val(prof_id);
            $('.editProgram').modal(); 
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