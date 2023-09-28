<?php
header('Content-Type: image/jpeg');

$filename = isset($_GET['file']) ? "images/art/".$_GET['file'].".jpg" : '';  

$image = imagecreatefromjpeg($filename);
$color = imagecolorallocate($image, 255, 255, 255);
$fontFile = realpath('font/Lato-Medium.ttf');


$fontsize1 = isset($_GET['size1']) ? $_GET['size1'] : 24;
$text1 = isset($_GET['text1']) ? $_GET['text1'] : '';
imagettftext($image, $fontsize1, 0, 140, 50, $color, $fontFile, $text1);


$fontsize2 = isset($_GET['size2']) ? $_GET['size2'] : 24;
$text2 = isset($_GET['text2']) ? $_GET['text2'] : '';
imagettftext($image, $fontsize2, 0, 140, 460, $color, $fontFile, $text2); 
if(isset($_GET['width'])) {
    $new_width = intval($_GET['width']);
    $image = imagescale($image, $new_width, $new_width); 
}

imagejpeg($image, NULL, 100); 
imagedestroy($image);
?>

