<?php
//TODO: Installer live sass compiler et compiler notre code sass pour voir le resultat dans le navigateur and then push the whole thing on github
require('model/database.php');
require('model/assignment_db.php');
require('model/course_db.php');

$assignment_id = filter_input(INPUT_POST, 'assignment_id', FILTER_VALIDATE_INT);

$assignment_description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'course_description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$course_name = filter_input(INPUT_POST, 'course_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);
if(!$course_id){
    $course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT); 
}

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "list_assignments";
}

switch($action){
    case "list_courses":
        $courses = get_courses();
        include('view/course_list.php');
        break;
    case "add_course":
        add_course($course_name,$description);
        header("Location: .?action=list_courses");
        break;
    case "add_assignment":
        if($course_id && $assignment_description){
            add_assignment($course_id,$assignment_description);
            header("Location: .?course_id=$course_id");
        }else{
            var_dump($assignment_description);
            $error = "Invalid assignment data. Check all fields and try again.";
            include("view/error.php");
            exit();
        }
        break;
    case "delete_course":
        if($course_id){
            try {
                delete_course($course_id);
            } catch (PDOException $e) {
                $error = "Can't delete course with assignment related to it.";
                include("view/error.php");
                exit();
            }
            header("Location: .?action=list_courses");
        }
        break;
    case "delete_assignment":
        if($assignment_id){
            delete_assignment($assignment_id);
            header("Location: .?course_id=$assignment_id");
        }else{
            $error = "Missing or incorrect assignment id.";
            include("view/error.php");
            exit();
        }
        break;
    default:
        $course_name = get_course_name($course_id);
        $courses = get_courses();
        $assignments = get_assignments_by_course($course_id);
        
        include('view/assignment_list.php');
}

?>