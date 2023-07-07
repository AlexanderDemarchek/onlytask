<!DOCTYPE html>
<html>
<head>
    <title> Тестовое задание </title>
     <link rel="stylesheet" href="static/template4.css">
</head>
<body>
    <div class="header">
        <h1><?= $title ?></h1>
    </div>
    <div class="content">
        <?php require($page_name); ?>
    </div>
    <div class="footer">created by Demarchek Alexandr</div>
</body>
<html>