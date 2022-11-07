<?php
$id = $_GET['id'];

if (!isset($id)) {
    error404('Не указан ID', 'Не указан ID');
}

$product = json_decode(file_get_contents('https://gameshop.mentor4u.ru/api/send_data?table=products&row=' . $id), true);

if (isset($product['status'])) {
    error404('Товар не найден', 'Товар не найден');
}

function error404($title, $description) {
    $titleHeader = '404';
    $link = '/products';
    $linkText = 'к списку товаров';
    require 'components/error-page.php';
    exit();
}

$title = $product['name'];
$styles = '<link rel="stylesheet" href="styles/product.css">';
$discount = $product['discount'] > 0 ? '<div class="discount-card">Скидка -' . $product['discount'] . '%</div>' : "";
$price = $product['discount'] > 0 ? $product['price'] - ($product['price'] / 100 * $product['discount']) : $product['price'];
$priceText = $product['discount'] > 0 ? "<s>{$product['price']}</s> $price$" : "{$product['price']}$";
$genres = '';

foreach ($product['genres'] as $genre) {
    $genres .= $genre . ', ';
}

$platforms = '';
foreach ($product['platforms'] as $platform) {
    $platforms .= $platform . ', ';
}

require 'components/header.php';
?>
<main>
    <section class="mini-header">
        <h1><?php echo $product['name'] . ' ' . $product['surname']; ?></h1>
        <p><?php echo $product['description']; ?></p>
        <a href="/products.php">Вернуться к списку товаров</a>
    </section>
    <section class="product">
        <div class="product-image">
            <img src="images/products/<?php echo $product['image']; ?>.jpg" alt="<?php echo $product['name']; ?>" width="300">
        </div>
        <div class="product-info">
            <h2>Информация о товаре:</h2>
            <p><b>Название</b>: <?php echo $product['name']; ?></p>
            <p><b>Рейтинг</b>: <?php echo $product['rating']; ?></p>
            <p><b>Дата выхода</b>: <?php echo $product['releaseDate']; ?></p>
            <p><b>Жанры</b>: <?php echo $genres ?></p>
            <p><b>Разработчик</b>: <?php echo $product['developer']; ?></p>
            <p><b>Издатель</b>: <?php echo $product['publisher']; ?></p>
            <p><b>Платформы</b>: <?php echo $platforms ?></p>
            <p class="warning-text"><b>Возрастное ограничение</b>: <?php echo $product['age']; ?>+</p>
            <div>
                <div>
                    <p class="price"><b>Цена</b>: <?php echo $priceText; ?></p>
                    <?php echo $discount; ?>
                </div>
                <div>
                    <button><b>Купить</b></button>
                    <button><img src="images/icons/shopping-cart.svg" alt="Корзина" width="20"></button>
                </div>
            </div>
        </div>
        <div class="product-description">
            <h2>Описание товара:</h2>
            <p><?php echo $product['detailedDescription']; ?></p>
        </div>
    </section>
</main>
<?php
require 'components/footer.php';
?>