<?php 
date_default_timezone_set('Asia/Manila');

include_once '../classes/db.classes.php';
include_once '../classes/programs.classes.php';
include_once '../classes/programs-cntrl.classes.php';

$programs = new programsCntrl();

$programs->setProgram();





// $users->setUsers();


if(isset($_GET['delete_program'])){
    $programs->deleteProgram($_GET['delete_program']);
    
}

if(isset($_GET['programid'])){
    $programs->getProgramId($_GET['programid']);
    
}

if(isset($_POST['btn_submit_edit'])){
   $edit_program_id = $_POST['edit_program_id'];
   $edit_program_name = $_POST['edit_program_name'];
   $edit_program_description = $_POST['edit_program_description'];
   $edit_program_tags = $_POST['edit_program_tags'];

      
   $programs->updateProgram($edit_program_name, $edit_program_description, $edit_program_tags, $edit_program_id);
 

   
}


?>