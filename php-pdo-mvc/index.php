<?php
require("model/database.php");
require("model/city_db.php");
/*GET form  */

/*POST form  */
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

$city = filter_input(INPUT_POST, "city_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if(!$city) {
    $city = filter_input(INPUT_GET, "city", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
$country_code = filter_input(INPUT_POST, "country_code", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$district = filter_input(INPUT_POST, "district", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$population = filter_input(INPUT_POST, "population", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


$action = filter_input(INPUT_POST,"action",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if(!$action) {
    $action = filter_input(INPUT_GET,"action",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if(!$action) $action = 'create_read_form';
}

switch($action){
    case "create":
        if($city && $country_code && $population && $district){
           $count = insert_city($city,$country_code,$district,$population);
           header("Location: .?action=select&city={$city}&created={$count}");
        }else{
            $error_message = "Invalid city data. Check all fields";
            include('view/error.php');
        }
        break;
    case "select":
        if($city){
            $results = select_city_by_name($city);
            include("view/update_delete_form.php");
        }else{
            $error_message = "Invalid city data. Check all fields";
            include('view/error.php');
        }
        break;
    case "update":
        if($id && $city && $country_code && $population && $district){
            $count = update_city($id, $city,$country_code,$district,$population);
            header("Location: .?action=select&city={$city}&updated={$count}");
         }else{
             $error_message = "Invalid city data. Check all fields";
             include('view/error.php');
         }
        break;
    case "delete":
        if($id){
            $count = delete_city($id);
            header("Location: .?deleted={$count}");
        }else{
            $error_message = "Invalid city data. Check all fields";
            include('view/error.php');
        }
        break;
    default:
        include('view/create_read_form.php');
}


?>

  