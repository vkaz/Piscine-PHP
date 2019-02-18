<?php
foreach ($_GET as $key => $value){
    $id = rand();
    file_put_contents('list.csv', $id . ";" . trim($_GET[$key]) . PHP_EOL, FILE_APPEND | LOCK_EX);
}
?>