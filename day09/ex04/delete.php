<?php
foreach ($_GET as $d => $val) {
    $file = file_get_contents('list.csv');
    $arr = explode("\n", $file);
    foreach ($arr as $v) {
        $new = explode(";", $v);
        if ($new[1] == $val) {
            $line = $new[0] . ";" . $new[1] . PHP_EOL;
            file_put_contents('list.csv', str_replace($line, '', $file));
        }
    }
}
?>