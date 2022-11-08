<?php

if (!isset($scripts)) {
    $scripts = '';
} else {
    foreach ($scripts as $script) {
        echo '<script src="scripts/' . $script . '.js"></script>';
    }
}

?>
<br>
<br>
<br>
<br>
<footer>
    <div class="footer-cooperate">
        <p>© 2022, <a href="/about">Good Night</a> все права защищены</p>
    </div>
</footer>
<?php echo $scripts; ?>
</body>
</html>