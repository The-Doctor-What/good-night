<?php
$products = json_decode(file_get_contents('https://gameshop.mentor4u.ru/api/send_data?table=products'), true);

if (isset($products['status'])) {
    $title = 'Ошибка';
    $titleHeader = '404';
    $link = '/';
    $linkText = 'на главную';
    $description = 'Не удалось загрузить список товаров по причине: ' . $products['message'];
    require 'components/error-page.php';
    exit();
}

$productList = '';
for ($id = 0; $id < count($products); $id++) {
    $discount = $products[$id]['discount'] > 0 ? '<div class="discount-card">Скидка -' . $products[$id]['discount'] . '%</div>' : "";
    $price = $products[$id]['discount'] > 0 ? $products[$id]['price'] - ($products[$id]['price'] / 100 * $products[$id]['discount']) : $products[$id]['price'];
    $priceText = $products[$id]['discount'] > 0 ? "<s>{$products[$id]['price']}</s> $price$" : "{$products[$id]['price']}$";
    $productList .= "
        <div class=\"card\">
            <div class=\"header-card\">
                <img src=\"images/products/{$products[$id]['image']}.jpg\" alt=\"Фото товара\" width=\"300\">
                <div>
                    <h2>{$products[$id]['name']}</h2>
                    $discount
                </div>
            </div>
            <div class=\"header-card\">
                <p>{$products[$id]['description']}</p>
            </div>
            <div class=\"buttons-card\">
                <button><b>Купить</b></button>
                <button><img src=\"images/icons/shopping-cart.svg\" alt=\"Корзина\" width=\"20\"></button>
            </div>
            <div class=\"footer-card\">
                <a href=\"product?id=$id\">Подробнее</a>
                <p class=\"price\"><b>Цена: $priceText</b></p>
            </div>
        </div>
    ";
}

$title = 'Товары нашего магазина';
$styles = '<link rel="stylesheet" href="styles/products.css">';
require 'components/header.php';
?>
    <main>
        <br>
        <br>
        <br>
        <h2>Товары нашего магазина</h2>
        <section class="search">
            <select name="platform" id="platform">
                <option value="all">Все платформы</option>
                <option value="pc">PC</option>
                <option value="xbox">Xbox</option>
                <option value="playstation">PlayStation</option>
                <option value="nintendo">Nintendo</option>
            </select>
            <input type="text" placeholder="Поиск">
        </section>
        <section class="cards">
            <?php echo $productList; ?>
        </section>
    </main>
<?php
require 'components/footer.php';
?>