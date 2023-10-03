<?php
include('header.php'); ?>
<section>
    <h2>Select Data/Read Data</h2>
    <form action="." method="get">
        <input type="hidden" name="action" value="select">
        <!--TODO: Difference between action="." and action="<= echo $_server["php_self]?> -->
        <label for="city">City Name: </label>
        <input type="text" id="city" name="city" required>
        <button>Submit</button>
    </form>
</section>
<section>
    <h2>Insert Data/Create Data</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="create">
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
<?php include('status.php')?>

<?php
include('footer.php'); ?>