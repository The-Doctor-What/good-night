<?php
if (!isset($title)) {
    $title = 'Не указан';
}
if (!isset($description)) {
    $description = 'Не указано';
}
if (isset($link) && isset($linkText)) {
    $link = '<a href="' . $link . '">' . $linkText . '</a>';
} else {
    $link = '';
}

?>
<section class="mini-header">
    <h1><?php echo $title; ?></h1>
    <p><?php echo $description; ?></p>
    <?php echo $link; ?>
</section>
