<?php 
include('header.php');
?>

<?php if ($results) { ?>
    <section>
        <h2>Update 🖋️ / Or Delete Data ❌</h2>
        <br>
        <?php foreach ($results as $result): {
            $id = $result['ID'];
            $city = $result['Name'];
            $country_code = $result['CountryCode'];
            $district = $result['District'];
            $population = $result['Population'];
            // echo $population;
        } ?>
        <form class="update" action="." method="post">
        <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="city_name-<?= $id; ?>">City Name:</label>
            <input required type="text" id="city_name-<?= $id ?>" name="city_name" value="<?= $city; ?>">
            <label for="country_code-<?= $id ?>">Country Code:</label>
            <input required type="text" id="country_code-<?= $id ?>" name="country_code" maxlength="3" value="<?= $country_code; ?>">
            <label for="district-<?= $id ?>">District:</label>
            <input required type="text" id="district-<?= $id ?>" name="district" value="<?= $district; ?>">
            <label for="population-<?= $id ?>">Population:</label>
            <input required type="text" id="population-<?= $population ;?>" name="population" value="<?= $population; ?>">
            <button>Update</button>
        </form>
        <form action="." method="post" class="delete">
        <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <button class="red">Delete</button>
        </form>
        <br>
        <hr>
        <br>
        <?php endforeach; ?>
    </section>
<?php } else { ?>

    <p>Sorry, no results. Please try again 👇</p>
   
<?php } ?>
<?php include('status.php')?>
<br>
<br>
<p style="margin:0 auto;"><a style=" text-decoration:none; font-weight:400;" href="<?php echo $_SERVER["PHP_SELF"]?>">Go to Request Forms 📜</a></p>

<?php 
include('footer.php');?>