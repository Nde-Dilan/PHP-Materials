<?php
require("database.php");

$id = filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);
$new_city = filter_input(INPUT_POST, "city_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$country_code = filter_input(INPUT_POST, "country_code", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$district = filter_input(INPUT_POST, "district", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$population = filter_input(INPUT_POST, "population", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


if($id){
    $query = 'UPDATE city
                SET Name =:city, CountryCode =:countrycode, District=:district,Population=:population
                        WHERE ID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id",$id);
    $statement->bindValue(":city",$new_city);
    $statement->bindValue(":countrycode",$country_code);
    $statement->bindValue(":district",$district);
    $statement->bindValue(":population",$population);
    $statement->execute();
    $statement->closeCursor();
}

$updated = true;

include("index.php");

?>