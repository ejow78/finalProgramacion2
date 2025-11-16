<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$width = 120;
$height = 40;
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

for ($i=0; $i<5; $i++){
    imageline($image, 0, rand() % $height, $width, rand() % $height, $line_color);
}

imagestring($image, 5, 10, 10, $captcha_code, $txt_color);

header("Content-type: image/png");
imagepng($image);
imagedestroy($image);
?>
