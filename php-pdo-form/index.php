<?php

/*GET form  */
$city = filter_input(INPUT_GET, "city", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

/*POST form  */
$new_city = filter_input(INPUT_POST, "city_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$country_code = filter_input(INPUT_POST, "country_code", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$district = filter_input(INPUT_POST, "district", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$population = filter_input(INPUT_POST, "population", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//Decision

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Tutorial</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <header>
            <h1>PHP PDO Turorial</h1>
        </header>
        <?php if (isset($deleted)) {
            echo "Record deleted.<br><br>";
        }else if(isset($updated)){
            echo "Record updated.<br><br>";
        } ?>
        <?php if (!$city && !$new_city) { ?>


            <section>
                <h2>Select Data/Read Data</h2>
                <form action="." method="get">
                    <!--TODO: Difference between action="." and action="<= echo $_server["php_self]?> -->
                    <label for="city">City Name: </label>
                    <input type="text" id="city" name="city" required>
                    <button>Submit</button>
                </form>
            </section>
            <section>
                <h2>Insert Data/Create Data</h2>
                <form action="." method="post">
                    <label for="city_name">City Name:</label>
                    <input required type="text" id="city_name" name="city_name">
                    <label for="country_code">Country Code:</label>
                    <input required type="text" id="country_code" name="country_code" maxlength="3">
                    <label for="district">District:</label>
                    <input required type="text" id="district" name="district">
                    <label for="population">Population:</label>
                    <input required type="text" id="population" name="population">
                    <button>Submit</button>
                </form>
            </section>
        <?php } else { ?>
            <?php require('database.php'); ?>
            <?php

            if ($new_city) {
                $query = "INSERT INTO city 
                                    (Name,CountryCode,District,Population)
                                VALUES
                                (:new_city,:country_code,:district,:population)";
                $statement = $db->prepare($query);
                $statement->bindValue(":new_city", $new_city);
                $statement->bindValue(":country_code", $country_code);
                $statement->bindValue(":district", $district);
                $statement->bindValue(":population", $population);
                $statement->execute();
                $results = $statement->fetchAll();
                $statement->closeCursor();
            }


            if ($city || $new_city) {

                $query = "SELECT * FROM city
                                WHERE Name=:city
                                ORDER BY Population DESC";
                $statement = $db->prepare($query);
                //Check if we are searching or not
                if ($city) {
                    $statement->bindValue(":city", $city);
                } else {
                    $statement->bindValue(":city", $new_city);
                }
                $statement->execute();
                $results = $statement->fetchAll();
                $statement->closeCursor();
            } ?>

            <?php if (!empty($results)) { ?>
                <section>
                    <h2>Update / Or Delete Data</h2>
                    <br>
                    <?php foreach ($results as $result): {
                        $id = $result['ID'];
                        $city = $result['Name'];
                        $country_code = $result['CountryCode'];
                        $district = $result['District'];
                        $population = $result['Population'];
                        // echo $population;
                    } ?>
                    <form class="update" action="update_record.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <label for="city_name-<?php echo $id; ?>">City Name:</label>
                        <input required type="text" id="city_name-<?php echo $id ?>" name="city_name" value="<?php echo $city; ?>">
                        <label for="country_code-<?php echo $id ?>">Country Code:</label>
                        <input required type="text" id="country_code-<?php echo $id ?>" name="country_code" maxlength="3" value="<?php echo $country_code; ?>">
                        <label for="district-<?php echo $id ?>">District:</label>
                        <input required type="text" id="district-<?php echo $id ?>" name="district" value="<?php echo $district; ?>">
                        <label for="population-<?php echo $id ?>">Population:</label>
                        <input required type="text" id="population-<?php echo $population ;?>" name="population" value="<?php echo $population; ?>">
                        <button>Update</button>
                    </form>
                    <form action="delete_record.php" method="post" class="delete">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button class="red">Delete</button>
                    </form>
                    <br>
                    <hr>
                    <br>
                    <?php endforeach; ?>
                </section>
            <?php } else { ?>
                <p>Sorry, no results</p>
            <?php } ?>
            <a style="margin:0 40px; text-decoration:none; font-weight:400;" href="<?php echo $_SERVER["PHP_SELF"]?>">Go to Request Forms</a>
        <?php } ?>
    </main>
</body>

</html>