<?php 

if(isset($_POST["submit"])){
    if(!empty($_FILES["upload"]["name"])){
        print_r($_FILES);

    }else{
        $msg = '<h1 style="color: red;">Please choose something...</h1>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <?php echo $msg ?? null;?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" >
Select image to Upload
<input type="file" name="upload">
<input type="submit" value="submit" name="submit">
</form>
</body>
</html>