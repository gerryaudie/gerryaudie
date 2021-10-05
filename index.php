<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Programming</title>
    <script src="cmd_script.js"></script>
</head>
<body>
<a href="?mn=home">Home</a>
<a href="?mn=genre">Genre</a>
<?php
$menu = filter_input(INPUT_GET, "mn");
switch($menu) {
    case "home":
        include_once 'pertemuan3/home_page.php';
        break;
    case "genre":
        include_once 'pertemuan3/genre_page.php';
        break;
    default:
}
</body>
</html>
