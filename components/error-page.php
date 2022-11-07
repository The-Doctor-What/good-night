<?php
$styles = '<link rel="stylesheet" href="../styles/error.css">';
require 'components/header.php';
if (!isset($title)) {
    $title = 'Не известная ошибка';
}
if (!isset($titleHeader)) {
    $titleHeader = 'Error';
}
if (!isset($description)) {
    $description = 'Неизвестная ошибка';
}
if (!isset($link)) {
    $link = '/';
}
if (!isset($linkText)) {
    $linkText = 'на главную';
}
$linkText = '<b>Мне всё равно</b>, верни меня ' . $linkText;
?>
    <main class="center">
        <section class="error-section">
            <h1><?php echo $titleHeader; ?></h1>
            <br>
            <p><?php echo $description; ?></p>
            <a href=<?php echo $link; ?>><?php echo $linkText; ?></a>
        </section>
    </main>
<?php
require 'components/footer.php';
?>