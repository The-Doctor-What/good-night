<?php
    if (!isset($title)) {
        $title = 'Без названия';
    }
    if (!isset($styles)) {
        $styles = '';
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title id="title"><?= $title . " | Good Night" ?></title>

    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <?= $styles ?>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body id="body">
<header>
    <a class="logo" href="/">Good Night</a>
    <div>
        <a class="link" href="/">Главная</a>
        <a class="link" href="/products">Товары</a>
        <a class="link" href="/auth">Авторизация</a>
    </div>
</header>