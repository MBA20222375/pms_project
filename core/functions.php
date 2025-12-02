<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* ------------------------------------------- */
function setMessages($type, $message)
{
    $_SESSION['message'] = [
        "type" => $type,
        "message" => $message,
    ];
}

function showMessages()
{
    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message']['type'];
        $message = $_SESSION['message']['message'];

        echo "<div class='alert alert-$type'>$message</div>";

        unset($_SESSION['message']); 
    }
}

/* ------------------------------------------- registerUser ------------------------------------------- */
function registerUser($name, $email, $password)
{
    $userFile = realpath(__DIR__ . "/../data/users.json");

    $users = file_exists($userFile)
        ? json_decode(file_get_contents($userFile), true)
        : [];

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $newUser = [
        "name" => $name,
        "email" => $email,
        "password" => $hashed,
    ];

    $users[] = $newUser;

    file_put_contents($userFile, json_encode($users, JSON_PRETTY_PRINT));

    $_SESSION["user"] = [
        "name" => $name,
        "email" => $email
    ];

    return true;
}

/* ------------------------------------------- loginUser ------------------------------------------- */
function loginUser($email, $password)
{
    $userFile = realpath(__DIR__ . "/../data/users.json");

    $users = file_exists($userFile)
        ? json_decode(file_get_contents($userFile), true)
        : [];

    foreach ($users as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            $_SESSION["user"] = [
                "name" => $user['name'],
                "email" => $user['email']
            ];
            return true;
        }
    }

    return false;
}

/* ------------------------------------------- saveContact ------------------------------------------- */
function saveContact($name, $email, $message)
{
    $file = __DIR__ . "/../data/contact.json";

    if (!file_exists($file)) {
        file_put_contents($file, "[]");
    }

    $contacts = json_decode(file_get_contents($file), true);

    $contacts[] = [
        "name" => $name,
        "email" => $email,
        "message" => $message
    ];

    file_put_contents($file, json_encode($contacts, JSON_PRETTY_PRINT));

    return true;
}

/*---------------------------------------------- checkout -----------------------------------------------*/

function Checkout($id, $name, $email, $number, $notes) {

        $checkout = __DIR__ . "/../data/checkout.json";

    if (!file_exists($checkout)) {
        mkdir($checkout, 0777, true);
    }

    $orders = [];
    if (file_exists($checkout)) {
        $content = file_get_contents($checkout);
        $orders = json_decode($content, true);
        if ($orders === null) {
            $orders = [];
        }
    }

    $orderKey = uniqid();

    $orders[$orderKey] = [
        'name'    => $name,
        'email'   => $email,
        'number'  => $number,
        'notes'   => $notes
    ];

    $json = json_encode($orders, JSON_PRETTY_PRINT);
    if ($json === false) {
        echo "JSON Error: " . json_last_error_msg();
        return false;
    }

    return file_put_contents($checkout, $json) !== false;
}


/* ------------------------------------------- getProducts ------------------------------------------- */
function getProducts() {
    $productsjsonfile = __DIR__ . '/../data/products.json';
    return file_exists($productsjsonfile) ? json_decode(file_get_contents($productsjsonfile), true) : [];
}

/* ------------------------------------------- createProduct ------------------------------------------- */
function createProduct($name, $price, $Details, $imagePath){
    $productsFile = __DIR__ . '/../data/products.json';
    $products = file_exists($productsFile) ? json_decode(file_get_contents($productsFile), true) : [];

    if (empty($products)) {
        $newId = 1; 
    } else {
        $ids = array_column($products, 'id');  
        $newId = max($ids) + 1;               
    }

    $newProduct = [
        "id" => $newId,
        "name" => $name,
        "price" => $price,
        "Details" => $Details,
        "image" => $imagePath
    ];

    $products[] = $newProduct;

    file_put_contents($productsFile, json_encode($products, JSON_PRETTY_PRINT));

    return true;
}

/*------------------------------------------------------- updateProduct --------------------------------------------------------*/
function updateProduct($id, $name, $price, $Details, $imagePath){
    $productsjsonfile = __DIR__ . '/../data/products.json';
    $products = file_exists($productsjsonfile) ? json_decode(file_get_contents($productsjsonfile), true) : [];
    $found = false;

    foreach($products as $index => $product){
        if($product['id'] == $id){
            $products[$index]['name'] = $name;
            $products[$index]['price'] = $price;
            $products[$index]['Details'] = $Details;

            if(!empty($imagePath)){
                $products[$index]['image'] = $imagePath;
            }

            $found = true;
            break;
        }
    }

    file_put_contents($productsjsonfile, json_encode($products, JSON_PRETTY_PRINT));

    return $found;
}

/*------------------------------------------------------- deleteproducts ---------------------------------------------------------*/
function Deleteproducts($id) {
    $productsFile = __DIR__ . '/../data/products.json';
    if (!file_exists($productsFile)) return false;

    $products = json_decode(file_get_contents($productsFile), true);

    $index = array_search($id, array_column($products, 'id'));

    if ($index === false) return false;

    unset($products[$index]);
    $products = array_values($products);

    file_put_contents($productsFile, json_encode($products, JSON_PRETTY_PRINT));
    return true;
}
/*----------------------------------------------add cart  -----------------------------------------------*/



function initCart() {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
}

function addToCart($id, $name, $price, $qty = 1) {
    initCart();

    // لو المنتج موجود مسبقاً زود الكمية
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_id'] == $id) {
            $item['quantity'] += $qty;
            return;
        }
    }

    // إذا مش موجود أضفه جديد
    $_SESSION['cart'][] = [
        'product_id' => $id,
        'name'       => $name,
        'price'      => $price,
        'quantity'   => $qty
    ];
}

function updateCartQty($id, $qty) {
    initCart();

    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_id'] == $id) {
            if ($qty <= 0) {
                removeFromCart($id);
            } else {
                $item['quantity'] = $qty;
            }
            return;
        }
    }
}

function removeFromCart($id) {
    initCart();

    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['product_id'] == $id) {
            unset($_SESSION['cart'][$index]);
            break;
        }
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

function getCartItems() {
    initCart();
    return $_SESSION['cart'];
}

function getCartTotal() {
    initCart();
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}
?>





