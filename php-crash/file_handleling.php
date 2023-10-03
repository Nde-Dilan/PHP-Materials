<?php

$file = 'user.txt';
if(file_exists($file)){
    // echo readfile($file);
    $handle = fopen($file, 'r');

    $content = fread($handle, filesize($file));

    fclose($handle);

    echo $content;
}else{

    $handle = fopen($file, 'w');
    $content = 'Brad, jjj' . PHP_EOL . "HHH";

    fwrite($handle,$content);
    fclose($handle);
}

?>