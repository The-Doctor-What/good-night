<?php
$title = 'О магазине';
$styles = '<link rel="stylesheet" href="styles/about.css">';
require 'components/header.php';
?>
    <main>
        <?php
        $title = 'О магазине';
        $description = 'На этой странице вы можете узнать о нашем магазине';
        require 'components/mini-header.php';
        ?>
        <section class="cards">
            <div class="card">
                <h2>in dev</h2>
                <p><b>Hello</b>: World</p>
            </div>
        </section>
    </main>
<?php
require 'components/footer.php';
?>