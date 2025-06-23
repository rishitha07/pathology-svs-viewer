<?php
$dir = "./uploads/";
$svsFiles = array_values(array_filter(scandir($dir), function ($file) use ($dir) {
    return is_file($dir . $file) && preg_match('/\.svs$/', $file);
}));
header('Content-Type: application/json');
echo json_encode($svsFiles);
?>
