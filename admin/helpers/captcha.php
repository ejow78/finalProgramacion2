<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$width = 160;
$height = 50;
$image = imagecreatetruecolor($width, $height);

$bg = imagecolorallocate($image, 255, 255, 255);
$txt_color = imagecolorallocate($image, 0, 0, 0);
$line_color = imagecolorallocate($image, 64, 64, 64);

imagefilledrectangle($image, 0, 0, $width, $height, $bg);

$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
$captcha_code = '';
for ($i=0; $i<5; $i++){
    $captcha_code .= $chars[rand(0, strlen($chars)-1)];
}

$_SESSION['captcha'] = $captcha_code;

for ($i=0; $i<8; $i++){
    imageline($image, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $line_color);
}
$x = ($width - (strlen($captcha_code) * 9)) / 2;
$y = ($height - 15) / 2;

imagestring($image, 5, $x, $y, $captcha_code, $txt_color);

header("Content-type: image/png");
imagepng($image);
imagedestroy($image);
?>