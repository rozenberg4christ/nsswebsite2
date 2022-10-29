<?php
include_once 'common.php';
include_once 'class.captcha.php';

$captcha = new Captcha();

$captcha->chars_number = 4;
$captcha->font_size = 19;
$captcha->tt_font = 'verdana.ttf';

$captcha->show_image(80, 30);
?>
